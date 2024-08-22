<?php

namespace App\Http\Controllers;

use App\Models\Facility;
use App\Models\FacilityImage;
use App\Models\FacilityType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class FasilitasController extends Controller
{
    public function index()
    {
        $facilities = Facility::with('facilityImages', 'facilityType')->get();
        $facilityTypes = FacilityType::all();
        $data = [
            'facilities' => $facilities,
            'facilityTypes' => $facilityTypes,
        ];
        return view('back.pages.adminFasilitas', $data);
    }



    public function getFacilities()
    {
        $facilities = Facility::with('facilityImages', 'facilityType')->get();
        $facilityTypes = FacilityType::all();
        $data = [
            'facilities' => $facilities,
            'facilityTypes' => $facilityTypes,
        ];
        return response()->json($data);
    }



    public function store(Request $request)
    {
        try {
            Log::info('Received request to store facility', $request->all());
            $request->validate([
                'name' => 'required|string|max:255',
                'size' => 'required|string|max:255',
                'kapasitas' => 'required|string|max:255',
                'information' => 'required|string|max:255',
                'pembayaran' => 'required|string|max:255',
                'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:5000',
            ]);

            $facility = Facility::create($request->except('images'));
            if ($request->hasFile('images')) {
                foreach ($request->file('images') as $image) {
                    $datePrefix = now()->format('ymd');
                    $randomNumber = str_pad(rand(0, 99999), 5, '0', STR_PAD_LEFT);
                    $originalFileName = pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME);
                    $extension = $image->getClientOriginalExtension();
                    $imageName = "{$datePrefix}{$randomNumber}_{$originalFileName}.{$extension}";
                    $destinationPath = public_path('facility_images');
                    $image->move($destinationPath, $imageName);

                    // Save the image information in facility_images table
                    FacilityImage::create([
                        'facility_id' => $facility->id,
                        'image' => $imageName,
                    ]);
                }
            }
            Log::info('Facility created successfully', ['facility' => $facility]);
            return response()->json($facility, 201);
        } catch (\Exception $e) {
            Log::error('Error in store method', ['exception' => $e]);
            return response()->json(['error' => 'Failed to save facility'], 500);
        }
    }

    public function deleteImage($id)
    {
        $facilityImage = FacilityImage::find($id);
        if (!$facilityImage) {
            return response()->json(['message' => 'Image not found'], 404);
        }
        $imagePath = public_path('facility_images/' . $facilityImage->image);
        if (file_exists($imagePath)) {
            unlink($imagePath);
        }
        $facilityImage->delete();
        return response()->json(['message' => 'Image deleted successfully'], 200);
    }
    public function updateFacility(Request $request, string $id)
    {
        try {
            Log::info('Received request to update facility', $request->all());
            $request->validate([
                'name' => 'nullable|string|max:255',
                'size' => 'nullable|string|max:255',
                'kapasitas' => 'nullable|string|max:255',
                'information' => 'nullable|string|max:255',
                'pembayaran' => 'nullable|string|max:255',
                'images.*' => 'image|mimes:jpeg,png,hiec,jpg,gif,svg|max:5000',
                'keep_images' => 'nullable|array',
                'keep_images.*' => 'integer|exists:facility_images,id',
                'imagesToRemove' => 'nullable|array',
                'imagesToRemove.*' => 'integer|exists:facility_images,id',
            ]);
            $facility = Facility::findOrFail($id);
            $facility->update($request->only([
                'name',
                'facility_type_id',
                'size',
                'kapasitas',
                'pembayaran',
                'information'
            ]));
            $keepImages = $request->input('keep_images', []);
            $imagesToRemove = $request->input('imagesToRemove', []);
            Log::info('Images to remove:', $imagesToRemove);

            if (!empty($imagesToRemove)) {
                foreach ($imagesToRemove as $imageId) {
                    $image = FacilityImage::find($imageId);
                    if ($image) {
                        $imagePath = public_path('facility_images/' . $image->image);
                        if (file_exists($imagePath)) {
                            unlink($imagePath);
                        }
                        $image->delete();
                    }
                }
            }



            if ($request->hasFile('images')) {
                foreach ($request->file('images') as $image) {
                    $datePrefix = now()->format('ymd');
                    $randomNumber = str_pad(rand(0, 99999), 5, '0', STR_PAD_LEFT);
                    $originalFileName = pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME);
                    $extension = $image->getClientOriginalExtension();
                    $imageName = "{$datePrefix}{$randomNumber}_{$originalFileName}.{$extension}";
                    $destinationPath = public_path('facility_images');
                    $image->move($destinationPath, $imageName);
                    FacilityImage::create([
                        'facility_id' => $facility->id,
                        'image' => $imageName,
                    ]);
                }
            }
            Log::info('Facility updated successfully', ['facility' => $facility]);
            return response()->json($facility, 201);
        } catch (\Illuminate\Validation\ValidationException $e) {
            // dd($request->all());
            Log::error('Validation error in update method', ['exception' => $e]);
            return response()->json(['error' => $e->errors()], 422); // Return 422 Unprocessable Entity status code for validation errors
        } catch (\Exception $e) {
            // dd($request->all());
            Log::error('Error in update method', ['exception' => $e]);
            return response()->json(['error' => 'Failed to update facility'], 500);
        }
    }
    public function destroy(string $id)
    {
        $facility = Facility::findOrFail($id);
        $facility->delete();
        return response()->json(null, 204);
    }




    public function update(Request $request, string $id)
    {
        try {
            Log::info('Received request to update facility', $request->all());
            $request->validate([
                'name' => 'nullable|string|max:255',
                'size' => 'nullable|string|max:255',
                'kapasitas' => 'nullable|string|max:255',
                'information' => 'nullable|string|max:255',
                'pembayaran' => 'nullable|string|max:255',
                'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
            $facility = Facility::findOrFail($id);
            $facility->update([
                'name' => $request->input('name', $facility->name),
                'facility_type_id' => $request->input('facility_type_id', $facility->facility_type_id),
                'size' => $request->input('size', $facility->size),
                'kapasitas' => $request->input('kapasitas', $facility->kapasitas),
                'pembayaran' => $request->input('pembayaran', $facility->pembayaran),
                'information' => $request->input('information', $facility->information),
            ]);
            if ($request->hasFile('images')) {
                foreach ($request->file('images') as $image) {
                    $datePrefix = now()->format('ymd');
                    $randomNumber = str_pad(rand(0, 99999), 5, '0', STR_PAD_LEFT);
                    $originalFileName = pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME);
                    $extension = $image->getClientOriginalExtension();
                    $imageName = "{$datePrefix}{$randomNumber}_{$originalFileName}.{$extension}";
                    $destinationPath = public_path('facility_images');
                    $image->move($destinationPath, $imageName);
                    FacilityImage::create([
                        'facility_id' => $facility->id,
                        'image' => $imageName,
                    ]);
                }
            }
            Log::info('Facility updated successfully', ['facility' => $facility]);
            return response()->json($facility, 201);
        } catch (\Illuminate\Validation\ValidationException $e) {
            dd($request->all());
            Log::error('Validation error in update method', ['exception' => $e]);
            return response()->json(['error' => $e->errors()], 422); // Return 422 Unprocessable Entity status code for validation errors
        } catch (\Exception $e) {
            dd($request->all());
            Log::error('Error in update method', ['exception' => $e]);
            return response()->json(['error' => 'Failed to update facility'], 500);
        }
    }
    public function show(string $id) {}
    public function edit(string $id) {}
    public function create() {}
}
