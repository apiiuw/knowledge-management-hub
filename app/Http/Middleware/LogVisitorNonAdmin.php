<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Visitor;

class LogVisitorNonAdmin
{
    public function handle(Request $request, Closure $next)
    {
        // Mencatat pengunjung pada setiap request
        Visitor::create([
            'ip_address' => $request->ip(),   // Simpan IP pengunjung
            'visit_date' => now(),             // Simpan waktu pengunjung
        ]);

        return $next($request);
    }
}
