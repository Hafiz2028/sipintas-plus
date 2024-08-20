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
        $rents = Rent::with(['facility', 'rentPayment' , 'user'])->get();
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
        ]);
        $rent = Rent::findOrFail($id);
        $rent->status = $validatedData['status'];
        $rent->save();
        return redirect()->route('admin.disposisi.index')->with('success', 'Peminjaman berhasil didisposisi.');
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
