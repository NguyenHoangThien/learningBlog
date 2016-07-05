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
        //
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
