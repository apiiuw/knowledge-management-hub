<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Visitor;
use Carbon\Carbon;

class LogVisitor
{
    public function handle(Request $request, Closure $next)
    {
        // Periksa jika halaman adalah detail buku
        if ($request->is('detail-buku/*')) {
            Visitor::create([
                'page' => $request->path(),
                'visit_date' => Carbon::now()->toDateString(),
            ]);
        }

        return $next($request);
    }
}
