<?php

namespace App\Http\Controllers;

use App\Models\Facility;
use App\Models\Rent;
use App\Models\User;
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
    public function history()
    {
        $user = User::with('rents.facility')->find(auth()->id());
        // dd($user);
        $data = [
            'user' => $user,
        ];
        return view('back.pages.historyPeminjaman', $data);
    }
    public function getRentById($id)
    {
        try {
            $rent = Rent::with('user', 'facility', 'rentPayment')->findOrFail($id);
            return response()->json($rent);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Rent not found'], 404);
        }
    }
    public function updatePeminjaman($id, Request $request)
    {
        try {
            $rent = Rent::findOrFail($id);
            Log::info('Updating rent record', ['id' => $id]);
            Log::info('Rent record found for update', ['rent_id' => $id]);
            $validated = $request->validate([
                'start' => 'required|date_format:Y-m-d\TH:i',
                'end' => 'required|date_format:Y-m-d\TH:i|after_or_equal:start',
                'surat' => 'nullable|file|mimes:pdf|max:2048',
                'pembayaran' => 'nullable|file|mimes:jpg,jpeg,png|max:2048',
            ]);
            Log::info('Request data validated successfully', ['validated_data' => $validated]);
            $facilityId = $rent->facility_id;
            Log::info('Checking for overlap with facility', ['facility_id' => $facilityId]);
            $overlap = Rent::where('facility_id', $facilityId)
                ->where('id', '!=', $id)
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
                Log::warning('Overlap detected for facility booking', ['facility_id' => $facilityId, 'start' => $validated['start'], 'end' => $validated['end']]);
                return redirect()->back()->with('error', 'Fasilitas telah dipinjam di jadwal ini.');
            }

            if ($request->hasFile('surat')) {
                Log::info('Processing surat file upload', ['file' => $request->file('surat')->getClientOriginalName()]);

                if ($rent->surat && file_exists(public_path('surat_peminjaman/' . $rent->surat))) {
                    Log::info('Deleting old surat file', ['file' => $rent->surat]);
                    unlink(public_path('surat_peminjaman/' . $rent->surat));
                }

                $file = $request->file('surat');
                $datePrefix = now()->format('ymd');
                $randomNumber = str_pad(rand(0, 99999), 5, '0', STR_PAD_LEFT);
                $originalFileName = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
                $extension = $file->getClientOriginalExtension();
                $fileName = "{$datePrefix}{$randomNumber}_{$originalFileName}.{$extension}";
                $destinationPath = public_path('surat_peminjaman');
                $file->move($destinationPath, $fileName);
                $rent->surat = $fileName;
                Log::info('Surat file uploaded successfully', ['file_name' => $fileName]);
            }
            if ($request->hasFile('pembayaran')) {
                Log::info('Processing pembayaran file upload', ['file' => $request->file('pembayaran')->getClientOriginalName()]);

                if ($rent->rentPayment && $rent->rentPayment->bukti_pembayaran && file_exists(public_path('bukti_pembayaran/' . $rent->rentPayment->bukti_pembayaran))) {
                    Log::info('Deleting old pembayaran file', ['file' => $rent->rentPayment->bukti_pembayaran]);
                    unlink(public_path('bukti_pembayaran/' . $rent->rentPayment->bukti_pembayaran));
                }

                $pembayaranFile = $request->file('pembayaran');
                $pembayaranFileName = Auth::id() . '_' . time() . '.' . $pembayaranFile->getClientOriginalExtension();
                $pembayaranDirectory = public_path('bukti_pembayaran');
                $pembayaranFile->move($pembayaranDirectory, $pembayaranFileName);

                $rentPayment = RentPayment::firstOrNew(['rent_id' => $rent->id]);
                $rentPayment->bukti_pembayaran = $pembayaranFileName;
                $rentPayment->save();
                Log::info('Pembayaran file uploaded and saved successfully', ['file_name' => $pembayaranFileName]);
            }
            $rent->start = $validated['start'];
            $rent->end = $validated['end'];
            $rent->save();
            Log::info('Rent details updated successfully', ['rent_id' => $id, 'start' => $rent->start, 'end' => $rent->end]);
            return redirect()->back()->with('success', 'Peminjaman updated successfully.');
        } catch (\Exception $e) {
            Log::error('Failed to update rent', ['exception' => $e]);
            return redirect()->back()->with('error', 'Terjadi kesalahan saat memperbarui peminjaman. Silakan coba lagi.');
        }
    }
    public function printSurat($id)
    {
        $rent = Rent::findOrFail($id);
        return view('back.pages.printSurat', ['rent' => $rent]);
    }

    public function destroy($id)
    {
        try {
            $rent = Rent::findOrFail($id);
            $rent->delete();
            return response()->json(['success' => true], 200);
        } catch (\Exception $e) {
            return response()->json(['success' => false], 500);
        }
    }
}
