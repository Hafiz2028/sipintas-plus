<?php

namespace App\Http\Controllers;

use App\Models\Facility;
use App\Models\FacilityType;
use App\Models\Rent;
use App\Models\FeedBack;
use App\Models\User;
use Illuminate\Http\Request;

class KabagController extends Controller
{
    public function home()
    {
        $user = auth()->user();
        $rents = Rent::with('facility', 'user', 'rentPayment')
            ->whereIn('status', ['proses kabag'])
            ->get();
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
}
