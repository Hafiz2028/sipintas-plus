<?php

namespace App\Http\Controllers;

use App\Models\Facility;
use App\Models\Rent;
use App\Models\RentPayment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class LandingController extends Controller
{
    public function landing()
    {
        $facilities = Facility::with('facilityType', 'facilityImages')->get();

        $data = [
            'facilities' => $facilities,
        ];
        return view('back.pages.index', $data);
    }
    public function detailBooking($facilityId)
    {
        $facility = Facility::with('facilityImages', 'facilityType')->findOrFail($facilityId);
        $rents = Rent::with('user', 'rentPayment')
            ->where('facility_id', $facilityId)
            ->get();
        return view('back.pages.bookingFasilitas', compact('facility', 'rents'));
    }
    public function bookFacility(Request $request)
    {
        try {
            $validated = $request->validate([
                'eventId' => 'required|integer|exists:facilities,id',
                'start' => 'required|date',
                'end' => 'required|date|after_or_equal:start',
                'surat' => 'required|file|mimes:pdf|max:2048',
                'pembayaran' => 'nullable|file|mimes:jpeg,jpg,png|max:2048',
            ]);
            $overlap = Rent::where('facility_id', $validated['eventId'])
                ->where(function ($query) use ($validated) {
                    $query->whereBetween('start', [$validated['start'], $validated['end']])
                        ->orWhereBetween('end', [$validated['start'], $validated['end']])
                        ->orWhere(function ($q) use ($validated) {
                            $q->where('start', '<=', $validated['start'])
                                ->where('end', '>=', $validated['end']);
                        })
                        ->orWhere(function ($q) use ($validated) {
                            $q->whereRaw('? BETWEEN start AND end', [$validated['start']])
                                ->orWhereRaw('? BETWEEN start AND end', [$validated['end']]);
                        });
                })->exists();

            if ($overlap) {
                return response()->json(['error' => 'Fasilitas telah dipinjam di jadwal ini.'], 400);
            }

            $suratDirectory = public_path('surat_peminjaman');
            $pembayaranDirectory = public_path('bukti_pembayaran');

            $suratPath = '';
            if ($request->hasFile('surat')) {
                $suratFile = $request->file('surat');
                $suratFileName = Auth::id() . '_' . time() . '.' . $suratFile->getClientOriginalExtension();
                $suratFile->move($suratDirectory, $suratFileName);
                $suratPath = $suratFileName;
            }
            $rent = new Rent();
            $rent->facility_id = $validated['eventId'];
            $rent->user_id = Auth::id();
            $rent->start = $validated['start'];
            $rent->end = $validated['end'];
            $rent->status = 'proses';
            $rent->surat = $suratPath;
            $rent->save();

            if ($request->hasFile('pembayaran')) {
                $pembayaranFile = $request->file('pembayaran');
                $pembayaranFileName = Auth::id() . '_' . time() . '.' . $pembayaranFile->getClientOriginalExtension();
                $pembayaranFile->move($pembayaranDirectory, $pembayaranFileName);
                $rentPayment = new RentPayment();
                $rentPayment->rent_id = $rent->id;
                $rentPayment->bukti_pembayaran = $pembayaranFileName;
                $rentPayment->save();
            }

            return response()->json(['success' => true, 'message' => 'Booking successful!']);
        } catch (\Exception $e) {
            Log::error('Booking error: ' . $e->getMessage());
            return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
        }
    }
}
