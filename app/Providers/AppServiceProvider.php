<?php

namespace App\Providers;

use App\Listeners\StoreNavMenu;
use App\Services\NavigationService;
use Illuminate\Auth\Events\Login;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

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
    public function boot(): void
    {
        View::composer('*', function ($view) {
            $modules = Auth::check()
                ? session('nav_modules', collect())
                : collect();

            $view->with('modules', $modules);
        });
    }
}
