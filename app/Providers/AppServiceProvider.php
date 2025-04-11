<?php

namespace App\Providers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\Paginator;
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
        //here we can make configurations
        // Model::preventLazyLoading(); can disable lazyloading sql queries and can only eager load them
        // Paginator::useBootstrapFive(); can switch to any blade template to be render for pagination
    }
}
