<?php

namespace App\Providers;

//added
use Illuminate\Pagination\Paginator;

//default
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        // 
        Paginator::useBootstrap();
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // to fix weird arrow while using paginate. cause, it takes tailwind as default 
        Paginator::useBootstrap();
    }
}
