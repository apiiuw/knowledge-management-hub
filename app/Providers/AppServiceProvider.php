<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Auth;
use App\Models\ForumDiscussion;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot()
    {
        // Menghitung jumlah forum diskusi yang belum terjawab
        $unansweredCount = ForumDiscussion::where('status', 'Belum Terjawab')->count();
        
        // Membagikan data unansweredCount ke semua tampilan
        view()->share('unansweredCount', $unansweredCount);

        // Membagikan data pengguna yang sedang login ke semua tampilan
        view()->composer('*', function ($view) {
            // Pastikan pengguna yang sedang login dibagikan ke tampilan
            $view->with('user', Auth::user());
        });
    }
}
