<?php

namespace App\Providers;

use Feather\IconManager;
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
         $icons = new IconManager();
         $icons->setSize(30);
        view()->share('icons',  $icons);
    }
}
