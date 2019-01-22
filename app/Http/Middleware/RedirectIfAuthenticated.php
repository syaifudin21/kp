<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        switch ($guard){
            case 'admin':
                if (Auth::guard($guard)->check()) {
                    return redirect()->route('admin.home');
                }
                break;
            case 'koordinator':
                if (Auth::guard($guard)->check()) {
                    return redirect()->route('koordinator.home');
                }
                break;
            case 'dosen':
                if (Auth::guard($guard)->check()) {
                    return redirect()->route('dosen.home');
                }
                break;
            case 'pembimbing':
                if (Auth::guard($guard)->check()) {
                    return redirect()->route('pembimbing.home');
                }
                break;
            default:
                if (Auth::guard($guard)->check()) {
                    return redirect()->route('mahasiswa.home');
                }
                break;
        }

        return $next($request);
    }
}
