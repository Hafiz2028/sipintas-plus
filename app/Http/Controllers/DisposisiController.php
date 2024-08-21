<?php

namespace App\Http\Controllers;

use App\Models\Rent;

use Illuminate\Http\Request;

class DisposisiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rents = Rent::with('facility', 'rentPayment', 'user')->get();
        $data = [
            'rents' => $rents
        ];
        return view('back.pages.adminDisposisi', $data);
    }

    public function getDisposisi()
    {
        $rents = Rent::with(['facility', 'rentPayment', 'user'])->get();
        $data = [
            'rents' => $rents
        ];
        return response()->json($data);
    }
    public function edit(string $id)
    {
        $rent = Rent::with('rentPayment')->findOrFail($id);

        $data = [
            'rent' => $rent
        ];
        return view('back.pages.detailDisposisi', $data);
    }
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'status' => 'required|in:diterima,ditolak',
            'reject_note' => 'nullable|string|max:255',
        ]);
        $rent = Rent::findOrFail($id);
        $rent->status = $validatedData['status'];
        if ($rent->status === 'ditolak') {
            $rent->reject_note = $validatedData['reject_note'];
        } else {
            $rent->reject_note = null;
        }
        $rent->save();
        if (auth()->check()) {
            $userRole = auth()->user()->role;
            if ($userRole === 'admin') {
                return redirect()->route('admin.disposisi.index')->with('success', 'Peminjaman berhasil didisposisi.');
            } elseif ($userRole === 'kabag') {
                return redirect()->route('kabag.disposisi.index')->with('success', 'Peminjaman berhasil didisposisi.');
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
