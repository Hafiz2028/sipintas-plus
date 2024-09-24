<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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
            if (Auth::user()->role == 'admin') {
                return redirect()->route('admin.home')->with('success', 'Selamat Datang di Beranda');
            }
            if (Auth::user()->role == 'superadmin') {
                return redirect()->route('superadmin.home')->with('success', 'Selamat Datang di Beranda');
            }
            if (Auth::user()->role == 'kabag') {
                return redirect()->route('kabag.home')->with('success', 'Selamat Datang di Beranda');
            }
            if (Auth::user()->role == 'kabiro') {
                return redirect()->route('kabiro.home')->with('success', 'Selamat Datang di Beranda');
            }
            if (Auth::user()->role == 'kasubag kdh') {
                return redirect()->route('kasubagkdh.home')->with('success', 'Selamat Datang di Beranda');
            }
            if (Auth::user()->role == 'kasubag wkdh') {
                return redirect()->route('kasubagwkdh.home')->with('success', 'Selamat Datang di Beranda');
            }
            if (Auth::user()->role == 'kasubag dalam') {
                return redirect()->route('kasubagdalam.home')->with('success', 'Selamat Datang di Beranda');
            }
            if (Auth::user()->role == 'peminjam') {
                return redirect()->route('homepage')->with('success', 'Selamat Datang di SIPINTAS PLUS');
            }
        } else {
            return redirect()->back()->withErrors([
                'login' => 'NIP dan Password yang dimasukkan tidak sesuai',
            ])->withInput();
        }
    }
    public function register()
    {
        return view('back.pages.register');
    }

    public function createUser(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'no_hp' => 'required|string|min:8',
            'opd' => 'required|string|max:255',
            'nip' => 'required|string|max:255|unique:users',
            'password' => 'required|string|min:5|confirmed',
        ]);
        $user = User::create([
            'name' => $request->input('name'),
            'no_hp' => $request->input('no_hp'),
            'opd' => $request->input('opd'),
            'nip' => $request->input('nip'),
            'role' => 'peminjam',
            'password' => Hash::make($request->input('password')),
        ]);
        return redirect()->route('login')->with('success', 'Registration successful! Please log in.');
    }
    public function adminRegister()
    {
        return view('back.pages.adminRegister');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->flush();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        // dd('logged out');
        return redirect('login');
    }
}
