<?php

namespace App\Http\Controllers;

use App\Models\Facility;
use App\Models\FacilityType;
use App\Models\Rent;
use App\Models\RentPayment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class RentController extends Controller
{
    public function index()
    {
        $rents = Rent::with('facility')
            ->whereIn('status', ['proses', 'diterima'])
            ->get();
        $facilityTypes = FacilityType::all();
        $facilities = Facility::all();
        $data = [
            'rents' => $rents,
            'facilities' => $facilities,
            'facilityTypes' => $facilityTypes,
        ];
        return view('back.pages.adminPeminjaman', $data);
    }
    public function getRents()
    {
        Log::info('getRents function called');
        $rents = Rent::with('facility')
            ->whereIn('status', ['proses', 'diterima'])
            ->get();
        $events = $rents->map(function ($rent) {
            Log::info('Facility ID:', ['facility_id' => $rent->facility_id]);
            return [
                'id' => $rent->id,
                'title' => $rent->facility->name,
                'start' => $rent->start,
                'end' => $rent->end,
                'surat' => $rent->surat,
                'facility_id' => $rent->facility_id,
            ];
        });
        return response()->json($events);
    }


    public function store(Request $request)
    {
        // dd($request->all());
        $validated = $request->validate([
            'facility_id' => 'required|exists:facilities,id',
            'start' => 'required|date',
            'end' => 'required|date|after:start',
            'surat' => 'required|file|mimes:pdf|max:2048',
            'bukti_pembayaran' => 'nullable|file|mimes:jpg,png,pdf|max:2048',
        ]);
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
            return response()->json(['error' => 'Fasilitas telah dipinjam di jadwal ini.'], 400);
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
            return response()->json(['error' => 'Surat file is required.'], 400);
        }

        // Create rent record
        $rent = Rent::create([
            'facility_id' => $validated['facility_id'],
            'user_id' => Auth::id(),
            'surat' => $suratPath,
            'status' => 'proses',
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
        return response()->json(['success' => 'Peminjaman Berhasil dibuat!', 'rent' => $rent], 201);
    }


    public function updateRent(Request $request, string $id)
    {
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
        }

        return response()->json(['success' => 'Peminjaman updated successfully!', 'rent' => $rent], 200);
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
