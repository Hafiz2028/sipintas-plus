<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string ...$guards): Response
    {
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
                $role = Auth::user()->role;
                if ($role === 'admin') {
                    return redirect()->route('admin.home');
                } elseif ($role === 'peminjam') {
                    return redirect()->route('homepage');
                } elseif ($role === 'kabag') {
                    return redirect()->route('kabag.home');
                } elseif ($role === 'kabiro') {
                    return redirect()->route('kabiro.home');
                } elseif ($role === 'kasubag kdh') {
                    return redirect()->route('kasubagkdh.home');
                } elseif ($role === 'kasubag wkdh') {
                    return redirect()->route('kasubagwkdh.home');
                } elseif ($role === 'kasubag dalam') {
                    return redirect()->route('kasubagdalam.home');
                } elseif ($role === 'superadmin') {
                    return redirect()->route('superadmin.home');
                }
            }
        }

        return $next($request);
    }
}
