<?php

namespace App\Http\Controllers;

use App\Models\Facility;
use App\Models\FeedBack;
use App\Models\Rent;
use App\Models\RentDetail;
use App\Models\RentPayment;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class LandingController extends Controller
{
    public function landing()
    {
        $facilities = Facility::with('facilityType', 'facilityImages')->get()->map(function ($facility) {
            return [
                'id' => $facility->id,
                'name' => $facility->name,
                'facilityType' => $facility->facilityType->name,
                'facilityTypeName' => $facility->facilityType->name,
                'detail_url' => route('detail-booking', ['facility' => $facility->id]),
                'image_url' => $facility->facilityImages->isNotEmpty()
                    ? asset('facility_images/' . $facility->facilityImages->first()->image)
                    : asset('facility_images/default-panjang.png'),
                'image_alt' => $facility->facilityImages->isNotEmpty()
                    ? $facility->facilityImages->first()->image
                    : 'No Image Available',
                'information' => $facility->information ?? 'No Information Available',
            ];
        });

        return view('back.pages.index', ['facilities' => $facilities]);
    }
    public function uploadFeedback(Request $request)
    {
        $validated = $request->validate([
            'feed' => 'nullable|string',
        ]);
        $feed = FeedBack::create([
            'feed' => $validated['feed'],
        ]);
        if ($feed) {
            return redirect()->back()->with('success', 'Saran berhasil ditambahkan');
        } else {
            return redirect()->back()->with('fail', 'Saran gagal ditambahkan, coba lagi');
        }
    }
    public function detailBooking($facilityId)
    {
        $facility = Facility::with('facilityImages', 'facilityType')->findOrFail($facilityId);
        $rents = Rent::with('user', 'rentPayment', 'rentDetail', 'facility.facilityType')
            ->where('facility_id', $facilityId)
            ->get();
        return view('back.pages.bookingFasilitas', compact('facility', 'rents'));
    }
    public function bookFacility(Request $request)
    {
        try {
            $validated = $request->validate([
                'eventId' => 'required|integer|exists:facilities,id',
                'agenda' => 'required|string|max:255',
                'start' => 'required|date',
                'end' => 'required|date|after_or_equal:start',
                'tujuan' => ['required_if:facility_type,Kendaraan', 'string', 'max:255'],
                'surat' => 'required|file|mimes:pdf|max:5000',
                'pembayaran' => 'required_if:facility_pembayaran,ya|file|mimes:jpeg,jpg,png,pdf|max:5000',
                'sppd' => 'required_if:facility_type,Kendaraan|in:ya,tidak',
                'bbm' => 'required_if:facility_type,Kendaraan|in:ya,tidak',
            ], [
                'start.required' => 'Tanggal mulai harus diisi.',
                'end.required' => 'Tanggal selesai harus diisi.',
                'end.after_or_equal' => 'Tanggal selesai harus setelah atau sama dengan tanggal mulai.',
                'tujuan.string' => 'Kolom tujuan harus diisi untuk Kategori Kendaraan.',
                'sppd.required_if' => 'Kolom Pembebanan dana SPPD harus diisi untuk Kategori Kendaraan.',
                'sppd.in' => 'Pilihan SPPD tidak valid.',
                'bbm.required_if' => 'Kolom Pembebanan dana BBM harus diisi untuk Kategori Kendaraan.',
                'bbm.in' => 'Pilihan BBM tidak valid.',
                'surat.required' => 'File surat harus diunggah.',
                'surat.file' => 'Surat harus berupa file.',
                'surat.mimes' => 'Surat harus berupa file PDF.',
                'surat.max' => 'Ukuran file surat maksimal 5 MB.',
                'pembayaran.file' => 'Bukti pembayaran harus berupa file.',
                'pembayaran.mimes' => 'Bukti pembayaran harus berupa file gambar (JPEG, JPG, PNG).',
                'pembayaran.max' => 'Ukuran file bukti pembayaran maksimal 5 MB.',
                'agenda.required' => 'Agenda harus diisi.',
                'agenda.string' => 'Agenda harus berupa teks.',
                'agenda.max' => 'Agenda maksimal 255 karakter.',
                'tujuan.max' => 'Tujuan maksimal 255 karakter.',
                'sppd.string' => 'SPPD harus berupa teks.',
                'bbm.string' => 'BBM harus berupa teks.',
            ]);
            $facilityType = Facility::find($validated['eventId'])->facilityType->name;
            if ($facilityType == 'Kendaraan') {
                $errors = [];
                if (!isset($validated['tujuan']) || empty($validated['tujuan'])) {
                    $errors['tujuan'] = 'Kolom tujuan harus diisi untuk Kategori Kendaraan.';
                }
                if (!isset($validated['sppd']) || empty($validated['sppd'])) {
                    $errors['sppd'] = 'Kolom Pembebanan dana SPPD harus diisi untuk Kategori Kendaraan.';
                }
                if (!isset($validated['bbm']) || empty($validated['bbm'])) {
                    $errors['bbm'] = 'Kolom Pembebanan dana BBM harus diisi untuk Kategori Kendaraan.';
                }
                if (!empty($errors)) {
                    Log::info('Validation errors:', $errors); // Log error messages for debugging
                    return response()->json(['error' => true, 'messages' => $errors], 400);
                }
            }
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


            $suratPath = '';
            if ($request->hasFile('surat')) {
                $suratFile = $request->file('surat');
                $datePrefix = now()->format('ymd');
                $randomNumber = str_pad(rand(0, 99999), 5, '0', STR_PAD_LEFT);
                $originalFileName = pathinfo($suratFile->getClientOriginalName(), PATHINFO_FILENAME);
                $extension = $suratFile->getClientOriginalExtension();
                $fileName = "{$datePrefix}{$randomNumber}_{$originalFileName}.{$extension}";
                $suratFile->move(public_path('surat_peminjaman'), $fileName);
                $suratPath = $fileName;
            }
            $rent = Rent::create([
                'facility_id' => $validated['eventId'],
                'user_id' => Auth::id(),
                'start' => $validated['start'],
                'end' => $validated['end'],
                'agenda' => $validated['agenda'],
                'status' => 'proses kabiro',
                'surat' => $suratPath,
            ]);

            if ($facilityType == 'Kendaraan') {
                $rentDetail = new RentDetail();
                $rentDetail->rent_id = $rent->id;
                $rentDetail->tujuan = $validated['tujuan'];
                $rentDetail->sppd = $validated['sppd'];
                $rentDetail->bbm = $validated['bbm'];
                $rentDetail->sppd_agreement = 'proses';
                $rentDetail->bbm_agreement = 'proses';
                $rentDetail->save();
            }
            if ($request->hasFile('pembayaran')) {
                if ($rent->rentPayment && $rent->rentPayment->bukti_pembayaran && file_exists(public_path('bukti_pembayaran/' . $rent->rentPayment->bukti_pembayaran))) {
                    Log::info('Deleting old pembayaran file', ['file' => $rent->rentPayment->bukti_pembayaran]);
                    unlink(public_path('bukti_pembayaran/' . $rent->rentPayment->bukti_pembayaran));
                }
                $pembayaranFile = $request->file('pembayaran');
                $pembayaranFileName = Auth::id() . '_' . time() . '.' . $pembayaranFile->getClientOriginalExtension();
                $pembayaranFile->move(public_path('bukti_pembayaran'), $pembayaranFileName);
                $rentPayment = new RentPayment();
                $rentPayment->rent_id = $rent->id;
                $rentPayment->bukti_pembayaran = $pembayaranFileName;
                $rentPayment->save();
            }


            return response()->json(['success' => true, 'message' => 'Booking successful!']);
        } catch (\Exception $e) {
            Log::error('Booking error: ' . $e->getMessage());
            return response()->json(['error' => false, 'message' => $e->getMessage()], 500);
        }
    }
    public function history()
    {
        $user = User::with([
            'rents' => function ($query) {
                $query->with(['facility.facilityType', 'rentPayment', 'rentDetail']);
            }
        ])->find(auth()->id());
        // dd($user);
        $data = [
            'user' => $user,
        ];
        return view('back.pages.historyPeminjaman', $data);
    }
    public function getRentById($id)
    {
        try {
            $rent = Rent::with('user', 'facility.facilityType', 'rentPayment', 'rentDetail')->findOrFail($id);
            return response()->json($rent);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Rent not found'], 404);
        }
    }
    public function updatePeminjaman($id, Request $request)
    {
        try {
            $rent = Rent::findOrFail($id);
            Log::info('Request Data:', $request->all());
            $startDateTime = $request->input('start_date') . 'T' . $request->input('start_time');
            $endDateTime = $request->input('end_date') . 'T' . $request->input('end_time');
            Log::info('Combined Start DateTime:', ['start_datetime' => $startDateTime]);
            Log::info('Combined End DateTime:', ['end_datetime' => $endDateTime]);
            $validated = $request->validate([
                'start_date' => 'required|date_format:Y-m-d',
                'start_time' => 'required|date_format:H:i',
                'end_date' => 'required|date_format:Y-m-d',
                'end_time' => 'required|date_format:H:i',
                'surat' => 'nullable|file|mimes:pdf|max:5000',
                'agenda' => 'required|string',
                'tujuan' => [
                    Rule::requiredIf(function () use ($request) {
                        return $request->input('facility_type') === 'Kendaraan';
                    }),
                    'nullable',
                    'string',
                    'max:255'
                ],
                'pembayaran' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:5000',
                'sppd' => 'required_if:facility_type,Kendaraan|in:ya,tidak',
                'bbm' => 'required_if:facility_type,Kendaraan|in:ya,tidak',
            ]);
            Log::info('Request data validated successfully', ['validated_data' => $validated]);
            $facilityId = $rent->facility_id;
            $facilityType = $rent->facility->facilityType->name;
            Log::info('Checking for overlap with facility', ['facility_id' => $facilityId]);
            $overlap = Rent::where('facility_id', $facilityId)
                ->where('id', '!=', $id)
                ->where(function ($query) use ($startDateTime, $endDateTime) {
                    $query->whereBetween('start', [$startDateTime, $endDateTime])
                        ->orWhereBetween('end', [$startDateTime, $endDateTime])
                        ->orWhere(function ($q) use ($startDateTime, $endDateTime) {
                            $q->where('start', '<=', $startDateTime)
                                ->where('end', '>=', $endDateTime);
                        })
                        ->orWhere(function ($q) use ($startDateTime, $endDateTime) {
                            $q->whereRaw('? BETWEEN start AND end', [$startDateTime])
                                ->orWhereRaw('? BETWEEN start AND end', [$endDateTime]);
                        });
                })->exists();

            if ($overlap) {
                Log::warning('Overlap detected for facility booking', ['facility_id' => $facilityId, 'start' => $startDateTime, 'end' => $endDateTime]);
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
            $rent->start = $startDateTime;
            $rent->end = $endDateTime;
            $rent->agenda = $validated['agenda'];
            $rent->save();

            if ($facilityType == 'Kendaraan') {
                $rentDetail = RentDetail::firstOrNew(['rent_id' => $rent->id]);
                $rentDetail->tujuan = $validated['tujuan'];
                $rentDetail->sppd = $validated['sppd'];
                $rentDetail->bbm = $validated['bbm'];
                $rentDetail->save();
            } else {
                if ($rent->rentDetail) {
                    $rent->rentDetail->delete();
                }
            }
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

    public function filter(Request $request)
    {
        try {
            $categories = $request->input('categories', []);

            // Start with all facilities
            $query = Facility::with('facilityType', 'facilityImages');

            // Apply category filters if any
            if (!empty($categories)) {
                $query->whereIn('facility_type_id', function ($q) use ($categories) {
                    $q->select('id')
                        ->from('facility_types')
                        ->whereIn('name', $categories);
                });
            }

            $facilities = $query->get()->map(function ($facility) {
                return [
                    'id' => $facility->id,
                    'name' => $facility->name,
                    'facilityTypeName' => $facility->facilityType->name,
                    'detail_url' => route('detail-booking', ['facility' => $facility->id]),
                    'image_url' => $facility->facilityImages->isNotEmpty()
                        ? asset('facility_images/' . $facility->facilityImages->first()->image)
                        : asset('facility_images/default-panjang.png'),
                    'image_alt' => $facility->facilityImages->isNotEmpty()
                        ? $facility->facilityImages->first()->image
                        : 'No Image Available',
                    'information' => $facility->information ?? 'No Information Available',
                ];
            });

            return response()->json(['facilities' => $facilities]);
        } catch (\Exception $e) {
            Log::error('Error filtering facilities: ' . $e->getMessage());
            return response()->json(['error' => 'An error occurred while filtering facilities.'], 500);
        }
    }
}
