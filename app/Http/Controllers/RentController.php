<?php

namespace App\Http\Controllers;

use App\Models\Facility;
use App\Models\FacilityType;
use App\Models\Rent;
use App\Models\RentDetail;
use App\Models\RentPayment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class RentController extends Controller
{
    public function index()
    {
        $rents = Rent::with(['facility.facilityType', 'rentPayment', 'rentDetail'])
            ->whereIn('status', ['proses kabag', 'proses kabiro', 'diterima'])
            ->get();
        $facilityTypes = FacilityType::all();
        $facilities = Facility::with('facilityType')->get();
        $data = [
            'rents' => $rents,
            'facilities' => $facilities,
            'facilityTypes' => $facilityTypes,
        ];
        return view('back.pages.adminPeminjaman', $data);
    }
    public function getRents()
    {
        $rents = Rent::with(['facility.facilityType', 'rentPayment', 'rentDetail'])
            ->whereIn('status', ['proses kabag', 'proses kabiro', 'diterima'])
            ->get();
        $events = $rents->map(function ($rent) {
            $rentDetail = $rent->rentDetail;
            $rentPayment = $rent->rentPayment;

            return [
                'id' => $rent->id,
                'title' => $rent->facility->name,
                'pembayaran' => $rent->facility->pembayaran,
                'start' => $rent->start,
                'end' => $rent->end,
                'surat' => $rent->surat,
                'facility_id' => $rent->facility_id,
                'agenda' => $rent->agenda,
                'tujuan' => $rentDetail ? $rentDetail->tujuan : null,
                'bukti_pembayaran' => $rentPayment ? $rentPayment->bukti_pembayaran : null,
                'sppd' => $rentDetail ? $rentDetail->sppd : null,
                'bbm' => $rentDetail ? $rentDetail->bbm : null,
                'status' => $rent->status,
            ];
        });
        return response()->json($events);
    }


    public function store(Request $request)
    {
        Log::info('dd: ' , $request->all());
        try {
            $validated = $request->validate([
                'facility_id' => 'required|exists:facilities,id',
                'start' => 'required|date_format:Y-m-d H:i',
                'end' => 'required|date_format:Y-m-d H:i|after:start',
                'surat' => 'required|file|mimes:pdf|max:2048',
                'bukti_pembayaran' => 'nullable|file|mimes:jpg,png,pdf|max:2048',
                'agenda' => 'nullable|string|max:255',
                'tujuan' => 'nullable|string|max:255',
                'sppd' => 'nullable|string|max:255',
                'bbm' => 'nullable|string|max:255',
            ]);
            $facility = Facility::findOrFail($validated['facility_id']);
            $facilityTypeName = $facility->facilityType->name;
            $overlap = Rent::where('facility_id', $validated['facility_id'])
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
                return response()->json(['error' => 'Fasilitas telah di pinjam pada jadwal ini.'], 400);
            }

            if ($request->hasFile('surat')) {
                $file = $request->file('surat');
                $datePrefix = now()->format('ymd');
                $randomNumber = str_pad(rand(0, 99999), 5, '0', STR_PAD_LEFT);
                $originalFileName = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
                $extension = $file->getClientOriginalExtension();
                $fileName = "{$datePrefix}{$randomNumber}_{$originalFileName}.{$extension}";
                $destinationPath = public_path('surat_peminjaman');
                $file->move($destinationPath, $fileName);
                $suratPath = $fileName;
            } else {
                return response()->json(['error' => 'File Surat harus di Tambahkan.'], 400);
            }

            $rent = Rent::create([
                'facility_id' => $validated['facility_id'],
                'user_id' => Auth::id(),
                'surat' => $suratPath,
                'status' => 'proses kabiro',
                'agenda' => $validated['agenda'],
                'start' => $validated['start'],
                'end' => $validated['end'],
            ]);
            if ($request->hasFile('bukti_pembayaran')) {
                $pembayaranFile = $request->file('bukti_pembayaran');
                $pembayaranFileName = Auth::id() . '_' . time() . '.' . $pembayaranFile->getClientOriginalExtension();
                $pembayaranDirectory = public_path('bukti_pembayaran');
                $pembayaranFile->move($pembayaranDirectory, $pembayaranFileName);

                $rentPayment = new RentPayment();
                $rentPayment->rent_id = $rent->id;
                $rentPayment->bukti_pembayaran = $pembayaranFileName;
                $rentPayment->save();
            }
            if ($facilityTypeName == 'Kendaraan') {
                $rentDetail = RentDetail::create([
                    'rent_id' => $rent->id,
                    'tujuan' => $validated['tujuan'] ?? null,
                    'sppd' => $validated['sppd'] ?? null,
                    'bbm' => $validated['bbm'] ?? null,
                    'sppd_agreement' => 'proses',
                    'bbm_agreement' => 'proses',
                ]);
                $rentDetail->save();
            }
            return response()->json(['success' => 'Peminjaman Berhasil dibuat!', 'rent' => $rent], 201);
        } catch (\Exception $e) {
            Log::error('Error in store method: ' . $e->getMessage());
            return response()->json(['error' => 'Terjadi Kesalahan saat membuat Peminjaman. : ' . $e->getMessage()], 400);
        }
    }


    public function updateRent(Request $request, string $id)
    {
        Log::info('Request Data:', $request->all());
        try {
            $validated = $request->validate([
                'facility_id' => 'required|exists:facilities,id',
                'start' => 'required|date_format:Y-m-d H:i',
                'end' => 'required|date_format:Y-m-d H:i|after:start',
                'bukti_pembayaran' => 'nullable|file|mimes:jpg,png,pdf|max:2048',
                'agenda' => 'nullable|string|max:255',
                'tujuan' => 'nullable|string|max:255',
                'sppd' => 'nullable|string|max:255',
                'bbm' => 'nullable|string|max:255',
            ]);
            Log::info('Validation passed', ['validated' => $validated]);
            $overlap = Rent::where('facility_id', $validated['facility_id'])
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
                Log::warning('Overlap detected', [
                    'facility_id' => $validated['facility_id'],
                    'start' => $validated['start'],
                    'end' => $validated['end']
                ]);
                return response()->json(['error' => 'Fasilitas telah dipinjam di jadwal ini.'], 400);
            }
            $rent = Rent::findOrFail($id);
            Log::info('Found Rent record', ['rent' => $rent]);
            if ($request->hasFile('surat')) {
                $file = $request->file('surat');
                $request->validate([
                    'surat' => 'required|file|mimes:pdf|max:2048',
                ]);
                $datePrefix = now()->format('ymd');
                $randomNumber = str_pad(rand(0, 99999), 5, '0', STR_PAD_LEFT);
                $originalFileName = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
                $extension = $file->getClientOriginalExtension();
                $fileName = "{$datePrefix}{$randomNumber}_{$originalFileName}.{$extension}";
                $destinationPath = public_path('surat_peminjaman');
                $file->move($destinationPath, $fileName);
                $suratPath = $fileName;
                Log::info('File uploaded', ['file_name' => $fileName]);
            } else {
                $request->validate([
                    'surat' => 'nullable|string',
                ]);
                $suratPath = $request->input('surat');
                Log::info('No surat file uploaded, using existing', ['suratPath' => $suratPath]);
            }

            $rent->update([
                'facility_id' => $validated['facility_id'],
                'surat' => $suratPath,
                'start' => $validated['start'],
                'end' => $validated['end'],
                'agenda' => $validated['agenda'] ?? $rent->agenda,
            ]);
            Log::info('Rent record updated', ['rent' => $rent]);

            if ($request->hasFile('bukti_pembayaran')) {
                $pembayaranFile = $request->file('bukti_pembayaran');
                $pembayaranFileName = Auth::id() . '_' . time() . '.' . $pembayaranFile->getClientOriginalExtension();
                $pembayaranDirectory = public_path('bukti_pembayaran');
                $pembayaranFile->move($pembayaranDirectory, $pembayaranFileName);

                // Create or update RentPayment record
                $rentPayment = RentPayment::firstOrNew(['rent_id' => $rent->id]);
                $rentPayment->bukti_pembayaran = $pembayaranFileName;
                $rentPayment->save();

                Log::info('Bukti Pembayaran file uploaded', ['file_name' => $pembayaranFileName]);
            } else {
                Log::info('No bukti_pembayaran file uploaded');
            }

            $facilityTypeName = $rent->facility->facilityType->name;
            Log::info('Facility Type', ['facilityTypeName' => $facilityTypeName]);
            if ($facilityTypeName == 'Kendaraan') {
                $rentDetail = RentDetail::where('rent_id', $rent->id)->first();
                if ($rentDetail) {
                    $rentDetail->update([
                        'tujuan' => $validated['tujuan'] ?? $rentDetail->tujuan,
                        'sppd' => $validated['sppd'] ?? $rentDetail->sppd,
                        'bbm' => $validated['bbm'] ?? $rentDetail->bbm,
                    ]);
                } else {
                    $rentDetail = RentDetail::create([
                        'rent_id' => $rent->id,
                        'tujuan' => $validated['tujuan'] ?? null,
                        'sppd' => $validated['sppd'] ?? null,
                        'bbm' => $validated['bbm'] ?? null,
                    ]);
                    Log::info('RentDetail created', ['rentDetail' => $rentDetail]);
                }
            }
            if ($rent->facility->pembayaran == 'tidak') {
                $rentPayment = RentPayment::where('rent_id', $rent->id)->first();
                if ($rentPayment) {
                    $rentPayment->delete();
                    Log::info('RentPayment removed', ['rent_id' => $rent->id]);
                }
            }
            return response()->json(['success' => 'Peminjaman updated successfully!', 'rent' => $rent], 200);
        } catch (\Exception $e) {
            Log::error('Error updating rent', ['exception' => $e->getMessage()]);
            return response()->json(['error' => 'Terjadi kesalahan saat memperbarui peminjaman.'], 500);
        }
    }
    public function uploadSurat(Request $request)
    {
        $request->validate([
            'surat' => 'required|file|mimes:pdf,doc,docx|max:2048',
        ]);

        $file = $request->file('surat');
        $datePrefix = now()->format('ymd');
        $randomNumber = str_pad(rand(0, 99999), 5, '0', STR_PAD_LEFT);
        $originalFileName = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
        $extension = $file->getClientOriginalExtension();
        $fileName = "{$datePrefix}{$randomNumber}_{$originalFileName}.{$extension}";
        $destinationPath = public_path('surat_peminjaman');
        $file->move($destinationPath, $fileName);

        return response()->json(['path' => "surat_peminjaman/{$fileName}"]);
    }


    public function update(Request $request, string $id)
    {
        // dd($request->all());
        Log::info('Request Data:', $request->all());
        $validated = $request->validate([
            'facility_id' => 'required|exists:facilities,id',
            'start' => 'required|date_format:Y-m-d\TH:i',
            'end' => 'required|date_format:Y-m-d\TH:i|after_or_equal:start',
            'surat' => 'nullable|file|mimes:pdf|max:2048',
        ]);
        Log::info('Validation passed', ['validated' => $validated]);
        $overlap = Rent::where('facility_id', $validated['facility_id'])
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
            Log::warning('Overlap detected', ['facility_id' => $validated['facility_id'], 'start' => $validated['start'], 'end' => $validated['end']]);
            return response()->json(['error' => 'Fasilitas telah dipinjam di jadwal ini.'], 400);
        }
        $rent = Rent::findOrFail($id);
        if ($request->hasFile('surat')) {
            $file = $request->file('surat');
            $datePrefix = now()->format('ymd');
            $randomNumber = str_pad(rand(0, 99999), 5, '0', STR_PAD_LEFT);
            $originalFileName = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
            $extension = $file->getClientOriginalExtension();
            $fileName = "{$datePrefix}{$randomNumber}_{$originalFileName}.{$extension}";
            $destinationPath = public_path('surat_peminjaman');
            $file->move($destinationPath, $fileName);
            $suratPath = $fileName;
            Log::info('File uploaded', ['file_name' => $fileName]);
        } else {
            $suratPath = $rent->surat;
        }

        $rent->update([
            'facility_id' => $validated['facility_id'],
            'surat' => $suratPath,
            'start' => $validated['start'],
            'end' => $validated['end'],
        ]);
        Log::info('Rent updated successfully', ['rent' => $rent]);
        return response()->json(['success' => 'Peminjaman updated successfully!', 'rent' => $rent], 200);
    }
    public function destroy(string $id) {}
    public function create() {}
    public function show(string $id) {}
    public function edit(string $id) {}
}
