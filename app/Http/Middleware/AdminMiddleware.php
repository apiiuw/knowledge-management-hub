<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // Cek apakah pengguna yang sedang login memiliki email tertentu (akses admin)
        if (Auth::check() && in_array(Auth::user()->email, [
            'rafirizqallahandilla@gmail.com',
            'urayfaisal@gmail.com',
            'urayfaisal.hafiz@jasaraharja.co.id',
        ])) {
            return $next($request);
        }
        

        // Jika bukan admin, redirect ke halaman lain
        return redirect('/')->with('error', 'Anda tidak memiliki akses ke halaman ini.');
    }
}
