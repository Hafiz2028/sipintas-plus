<?php

namespace App\Http\Controllers;

use App\Models\Facility;
use App\Models\FacilityType;
use App\Models\Rent;
use App\Models\User;
use App\Models\FeedBack;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function home()
    {
        $user = auth()->user();
        if ($user->role == 'superadmin' || $user->role == 'admin') {
            $rents = Rent::with('facility', 'user', 'rentPayment')
                ->whereIn('status', ['proses kabag', 'proses kabiro', 'proses kasubag kdh', 'proses kasubag wkdh', 'proses kasubag dalam'])
                ->get();
        } else if ($user->role == 'kabiro') {
            $rents = Rent::with('facility', 'user', 'rentPayment')
                ->whereIn('status', ['proses kabiro'])
                ->get();
        } else if ($user->role == 'kabag') {
            $rents = Rent::with('facility', 'user', 'rentPayment')
                ->whereIn('status', ['proses kabag'])
                ->get();
        } else if ($user->role == 'kasubag kdh') {
            $rents = Rent::with('facility', 'user', 'rentPayment')
                ->whereIn('status', ['proses kasubag kdh'])
                ->get();
        } else if ($user->role == 'kasubag wkdh') {
            $rents = Rent::with('facility', 'user', 'rentPayment')
                ->whereIn('status', ['proses kasubag wkdh'])
                ->get();
        } else if ($user->role == 'kasubag dalam') {
            $rents = Rent::with('facility', 'user', 'rentPayment')
                ->whereIn('status', ['proses kasubag dalam'])
                ->get();
        }
        $feedback = Feedback::all();
        $rentsCount = $rents->count();
        $facilitiesCount = Facility::count();
        $usersCount = User::count();
        $facilityTypesCount = FacilityType::count();

        $data = [
            'user' => $user,
            'feedback' => $feedback,
            'rents' => $rents,
            'rentsCount' => $rentsCount,
            'facilitiesCount' => $facilitiesCount,
            'usersCount' => $usersCount,
            'facilityTypesCount' => $facilityTypesCount,
        ];
        return view('back.pages.adminIndex', $data);
    }
    public function viewProfile()
    {
        $user = auth()->user();

        $data = [
            'user' => $user,
        ];
        return view('back.pages.adminProfile', $data);
    }

    public function changeProfilePicture(Request $request)
    {
        $user = User::findOrFail($request->user()->id);
        $path = 'profile/';
        $file = $request->file('adminProfilePictureFile');
        $old_picture = $user->getAttributes()['picture'];
        $file_name = $path . $old_picture;
        $extension = $file->getClientOriginalExtension();
        $filename = 'PROFILE_PICT_' . rand(2, 1000) . $user->id . time() . uniqid() . $extension;
        $destinationPath = public_path('profile');
        $upload = $file->move($destinationPath, $filename);

        if ($upload) {
            if ($old_picture != null && $old_picture !== 'default-avatar.png' && File::exists(public_path($path . $old_picture))) {
                File::delete(public_path($path . $old_picture));
            }
            $user->update(['picture' => $filename]);
            return response()->json(['status' => 1, 'msg' => 'Foto Profile berhasil diubah']);
        } else {
            return response()->json(['status' => 0, 'msg' => 'Terjadi Kesalahan']);
        }
    }
    public function updateProfile(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'nip' => 'required|string|max:255',
            'opd' => 'required|string|max:255',
            'no_hp' => 'required|string|max:20',
            'password' => 'nullable|string|min:4|confirmed',
        ], [
            'password.confirmed' => 'Password dan konfirmasi password tidak cocok. Silakan coba lagi.',
            'password.min' => 'Password dan konfirmasi password tidak cocok. Silakan coba lagi.',
        ]);
        $user = auth()->user();
        $user->name = $validatedData['name'];
        $user->nip = $validatedData['nip'];
        $user->opd = $validatedData['opd'];
        $user->no_hp = $validatedData['no_hp'];
        if (!empty($validatedData['password'])) {
            $newPassword = $validatedData['password'];
            $user->password = bcrypt($newPassword);
            $passwordUpdated = true;
        } else {
            $newPassword = null;
            $passwordUpdated = false;
        }

        if ($user->save()) {
            if ($passwordUpdated) {
                $newPassword = $validatedData['password'];
                $successMessage = "Profil berhasil diperbarui. Password baru Anda adalah:<br><b>\"$newPassword\"</b>";

                return redirect()->back()->with('success', $successMessage);
            } else {
                return redirect()->back()->with('success', 'Profil berhasil diperbarui, password tidak diubah.');
            }
        } else {
            return redirect()->back()->with('error', 'Gagal memperbarui profil. Silakan coba lagi.');
        }
    }
}
