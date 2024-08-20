<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FacilityType;
use Illuminate\Support\Facades\Log;

class TipeFasilitasController extends Controller
{
    public function index()
    {
        $facilityTypes = FacilityType::all();
        return view('back.pages.adminKategori', ['facilityTypes' => $facilityTypes]);
    }
    public function getFacilityTypes()
    {
        $facilityTypes = FacilityType::all();
        return response()->json($facilityTypes);
    }
    public function store(Request $request)
    {
        try {
            Log::info('Received request to store facility type', $request->all());
            $request->validate([
                'name' => 'required|string|max:255',
            ]);

            $facilityType = FacilityType::create($request->all());
            Log::info('Facility type created successfully', ['facilityType' => $facilityType]);
            return response()->json($facilityType, 201);
        } catch (\Exception $e) {
            Log::error('Error in store method', ['exception' => $e]);
            return response()->json(['error' => 'Failed to save facility type'], 500);
        }
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $facilityType = FacilityType::findOrFail($id);
        $facilityType->update($request->all());
        return response()->json($facilityType);
    }

    public function destroy(string $id)
    {
        $facilityType = FacilityType::findOrFail($id);
        $facilityType->delete();
        return response()->json(null, 204);
    }

    public function create() {}
    public function show(string $id) {}
    public function edit(string $id) {}
}
