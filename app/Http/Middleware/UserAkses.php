<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class UserAkses
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $role): Response
    {
        if ($request->route()->getName() === 'landing') {
            return $next($request);
        }
        if (!Auth::check()) {
            return redirect()->route('landing');
        }
        if (auth()->user()->role !== $role) {
            return redirect()->back()->with('error', 'Anda Tidak bisa akses Halaman Ini.');
        }
        return $next($request);
    }
}
