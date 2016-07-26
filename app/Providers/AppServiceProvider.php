<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Film;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //delete related inventories as per https://laravel.com/docs/5.2/eloquent#events
        Film::deleting(function ($film) {
            $film->inventories()->delete();
        });
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
