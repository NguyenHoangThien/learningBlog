<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Navigators;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // this is place to pass data to all view 
        // if you want to use it you should add
        // use View; at the top of file controller
        $navigators = Navigators::wherenavactive(1)->orderBy('navSortCode')->get();
        view()->share('navigators', $navigators);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
