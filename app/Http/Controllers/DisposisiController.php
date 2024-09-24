<?php

namespace App\Http\Controllers;

use App\Models\Rent;

use App\Models\RentDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class DisposisiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (auth()->check()) {
            $userRole = auth()->user()->role;
            if ($userRole === 'superadmin' || $userRole === 'admin') {
                $rents = Rent::with('facility.facilityType', 'rentPayment', 'user', 'rentDetail')->get();
            } elseif ($userRole === 'kabag') {
                $rents = Rent::with('facility.facilityType', 'rentPayment', 'user', 'rentDetail')
                    ->whereIn('status', ['proses kabag', 'diterima', 'ditolak'])
                    ->orderBy('created_at', 'desc')
                    ->get();
            } elseif ($userRole === 'kabiro') {
                $rents = Rent::with('facility.facilityType', 'rentPayment', 'user', 'rentDetail')
                    ->whereIn('status', ['proses kabiro', 'diterima', 'ditolak'])
                    ->get();
            } elseif ($userRole === 'kasubag kdh') {
                $rents = Rent::with('facility.facilityType', 'rentPayment', 'user', 'rentDetail')
                    ->whereIn('status', ['proses kasubag kdh', 'diterima', 'ditolak'])
                    ->get();
            } elseif ($userRole === 'kasubag wkdh') {
                $rents = Rent::with('facility.facilityType', 'rentPayment', 'user', 'rentDetail')
                    ->whereIn('status', ['proses kasubag wkdh', 'diterima', 'ditolak'])
                    ->get();
            } elseif ($userRole === 'kasubag dalam') {
                $rents = Rent::with('facility.facilityType', 'rentPayment', 'user', 'rentDetail')
                    ->whereIn('status', ['proses kasubag dalam', 'diterima', 'ditolak'])
                    ->get();
            }
        }
        $data = [
            'rents' => $rents
        ];
        return view('back.pages.adminDisposisi', $data);
    }

    public function getDisposisi()
    {
        if (auth()->check()) {
            $userRole = auth()->user()->role;
            if ($userRole === 'superadmin' || $userRole === 'admin') {
                $rents = Rent::with('facility.facilityType', 'rentPayment', 'user', 'rentDetail')->get();
            } elseif ($userRole === 'kabag') {
                $rents = Rent::with('facility.facilityType', 'rentPayment', 'user', 'rentDetail')
                    ->whereIn('status', ['proses kabag', 'diterima', 'ditolak'])
                    ->get();
            } elseif ($userRole === 'kabiro') {
                $rents = Rent::with('facility.facilityType', 'rentPayment', 'user', 'rentDetail')
                    ->whereIn('status', ['proses kabiro', 'diterima', 'ditolak'])
                    ->get();
            } elseif ($userRole === 'kasubag kdh') {
                $rents = Rent::with('facility.facilityType', 'rentPayment', 'user', 'rentDetail')
                    ->whereIn('status', ['proses kasubag kdh', 'diterima', 'ditolak'])
                    ->get();
            } elseif ($userRole === 'kasubag wkdh') {
                $rents = Rent::with('facility.facilityType', 'rentPayment', 'user', 'rentDetail')
                    ->whereIn('status', ['proses kasubag wkdh', 'diterima', 'ditolak'])
                    ->get();
            } elseif ($userRole === 'kasubag dalam') {
                $rents = Rent::with('facility.facilityType', 'rentPayment', 'user', 'rentDetail')
                    ->whereIn('status', ['proses kasubag dalam', 'diterima', 'ditolak'])
                    ->get();
            }
        }
        $data = [
            'rents' => $rents
        ];
        return response()->json($data);
    }
    public function updateDriver(Request $request, $id)
    {
        $request->validate([
            'sopir' => 'required|string|max:255',
        ]);
        $rent = Rent::findOrFail($id);
        $oldDriverName = $rent->rentDetail->sopir;
        $rent->rentDetail->sopir = $request->input('sopir');
        $rent->rentDetail->save();
        Log::info("Updated driver name for Rent ID $id: Old Name: $oldDriverName, New Name: " . $request->input('sopir'));
        return response()->json(['message' => 'Driver name updated successfully']);
    }
    public function edit(string $id)
    {
        $rent = Rent::with('rentPayment', 'rentDetail')->findOrFail($id);

        $data = [
            'rent' => $rent
        ];
        return view('back.pages.detailDisposisi', $data);
    }
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'status' => 'required|in:diterima,ditolak,proses kabag,proses kabiro,proses kasubag kdh,proses kasubag wkdh,proses kasubag dalam',
            'reject_note' => 'nullable|string|max:255',
            'sppd_agreement' => 'nullable|in:diterima,ditolak',
            'bbm_agreement' => 'nullable|in:diterima,ditolak',
        ]);
        $rent = Rent::findOrFail($id);
        $rent->status = $validatedData['status'];
        $rent->reject_note = $validatedData['reject_note'];
        $rent->save();
        if ($rent->facility->facilityType->name == 'Kendaraan') {
            $rentDetail = RentDetail::where('rent_id', $rent->id)->first();
            if ($rentDetail) {
                $rentDetail->sppd_agreement = $validatedData['sppd_agreement'] ?? $rentDetail->sppd_agreement;
                $rentDetail->bbm_agreement = $validatedData['bbm_agreement'] ?? $rentDetail->bbm_agreement;
                $rentDetail->save();
            }
        }
        if (auth()->check()) {
            $userRole = auth()->user()->role;
            if ($userRole === 'admin') {
                return redirect()->route('admin.disposisi.index')->with('success', 'Peminjaman berhasil didisposisi.');
            } elseif ($userRole === 'kabag') {
                return redirect()->route('kabag.disposisi.index')->with('success', 'Peminjaman berhasil didisposisi.');
            } elseif ($userRole === 'kabiro') {
                return redirect()->route('kabiro.disposisi.index')->with('success', 'Peminjaman berhasil didisposisi.');
            } elseif ($userRole === 'superadmin') {
                return redirect()->route('superadmin.disposisi.index')->with('success', 'Peminjaman berhasil didisposisi.');
            } elseif ($userRole === 'kasubag kdh') {
                return redirect()->route('kasubagkdh.disposisi.index')->with('success', 'Peminjaman berhasil didisposisi.');
            } elseif ($userRole === 'kasubag wkdh') {
                return redirect()->route('kasubagwkdh.disposisi.index')->with('success', 'Peminjaman berhasil didisposisi.');
            } elseif ($userRole === 'kasubag dalam') {
                return redirect()->route('kasubagdalam.disposisi.index')->with('success', 'Peminjaman berhasil didisposisi.');
            }
        }
        return redirect()->route('landing')->with('error', 'Anda tidak memiliki akses untuk melakukan tindakan ini.');
    }
    public function create()
    {
        //
    }
    public function store(Request $request)
    {
        //
    }
    public function show(string $id)
    {
        //
    }
    public function destroy(string $id)
    {
        try {
            $disposisi = Rent::findOrFail($id);
            $disposisi->delete();

            return response()->json(['message' => 'Disposisi deleted successfully'], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error deleting disposisi'], 500);
        }
    }
}
