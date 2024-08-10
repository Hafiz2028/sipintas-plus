<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function home()
    {
        $user = auth()->user();

        $data = [
            'user' => $user,
        ];
        return view('back.pages.adminIndex', $data);
    }
}
