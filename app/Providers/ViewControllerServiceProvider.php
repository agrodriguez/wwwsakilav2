<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Category;

use App\Language;

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
