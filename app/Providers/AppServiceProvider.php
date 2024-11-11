<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
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
        $unansweredCount = ForumDiscussion::where('status', 'Belum Terjawab')->count();

        view()->share('unansweredCount', $unansweredCount);
    }
}
