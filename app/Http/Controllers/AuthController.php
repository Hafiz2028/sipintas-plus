<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login()
    {
        return view('back.pages.login');
    }

    public function loginHandler(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'nip' => 'required|string',
            'password' => 'required|string',
        ], [
            'nip.required' => 'NIP wajib diisi',
            'password.required' => 'Password wajib diisi',
        ]);

        $credentials = [
            'nip' => $request->nip,
            'password' => $request->password,
        ];
        if (Auth::attempt($credentials)) {
            if (Auth::user()->role == 'admin' || Auth::user()->role == 'kabag') {
                return redirect()->route('admin.home');
            }
            if (Auth::user()->role == 'peminjam') {
                return redirect()->route('landing');
            }
        } else {
            return redirect()->back()->withErrors([
                'loginError' => 'NIP dan Password yang dimasukkan tidak sesuai',
            ])->withInput();
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect('login');
    }
}
