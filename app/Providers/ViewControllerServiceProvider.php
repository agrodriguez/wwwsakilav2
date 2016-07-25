<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Category;

use App\Language;

use App\Country;

use App\Actor;

use DB;

class ViewControllerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        /**
         * compose view for films form passing lists
         */
        view()->composer('films._form', function ($view) {
            $categories=Category::lists('name', 'category_id')->all();

            $actors = DB::table('actor')->select(DB::raw('actor_id, concat(first_name," ", last_name) as name'))->lists('name', 'actor_id');

            $languages = Language::lists('name', 'language_id')->all();

            $ratings = [
                'G'=>'G',
                'PG'=>'PG',
                'PG-13'=>'PG-13',
                'R'=>'R',
                'NC-17'=>'NC-17'
            ];

            $specialFeatures =[
                'Trailers'=>'Trailers',
                'Commentaries'=>'Commentaries',
                'Deleted Scenes'=>'Deleted Scenes',
                'Behind the Scenes'=>'Behind the Scenes'
            ];

            $view->with(['categories'=>$categories,'ratings'=>$ratings,'specialFeatures'=>$specialFeatures,'actors'=>$actors,'languages'=>$languages]);
        });

        /**
         * compose view for staffs and customers form passing lists
         */
        view()->composer(['staffs._form', 'customers._form', 'cities._form', 'stores._form'], function ($view) {
            
            $countries=Country::lists('country', 'country_id')->all();
            //$stores=Store::with('address.city.country')->get();
            $stores= DB::table('store')->join('address', 'store.address_id', '=', 'address.address_id')
            ->join('city', 'address.city_id', '=', 'city.city_id')
            ->join('country', 'city.country_id', '=', 'country.country_id')
            ->select(DB::raw('store.store_id, concat(city.city,", ", country.country) as address'))
            ->lists('address', 'store_id');

            $view->with(['countries'=>$countries,'stores'=>$stores]);
        });
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
