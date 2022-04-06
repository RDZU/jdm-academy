<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use App\Course;
use View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //permite pasar valores a todos las vistas
        Schema::defaultStringLength(191);

 $dropdown = Course::where('published', 1)->orderBy('id', 'desc')->get();
 View::share('dropdown',$dropdown);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
        /**
         * Added missing method for package to work
         */
        \Illuminate\Support\Collection::macro('lists', function ($a, $b = null) {
            return collect($this->items)->pluck($a, $b);
        });

    }
}
