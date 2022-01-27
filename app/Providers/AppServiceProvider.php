<?php

namespace App\Providers;

//added
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Schema;
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

//        Paginator::useBootstrap();
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
                                // to fix weird arrow while using paginate. cause, it takes tailwind as default
//        Paginator::useBootstrap();
//        Schema::defaultStringLength(191);


                                // model unguarding
//        Model::unguard();

        Gate::define('admin', function (User $user){
           return $user->username === "Damore.ora";
        });

        Blade::if('admin', function (){
           if (request()->user()){
               return request()->user()->can('admin');
           }
        });
    }
}
