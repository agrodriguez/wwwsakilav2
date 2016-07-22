<?php

namespace App\Providers;

use Illuminate\Routing\Router;

use Illuminate\Http\Request;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to your controller routes.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'App\Http\Controllers';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @param  \Illuminate\Routing\Router  $router
     * @return void
     */
    public function boot(Router $router)
    {
        //

        parent::boot($router);

        $router->bind('actor', function ($value) {
            return \App\Actor::whereSlug($value)->firstOrFail();
        });

        $router->bind('staff', function ($value) {
            return \App\Staff::whereSlug($value)->firstOrFail();
        });

        $router->bind('customer', function ($value) {
            return \App\Customer::whereSlug($value)->firstOrFail();
        });

        /** dynamic implicit 'where' to your Eloquent queries */
        
        $router->bind('category', function ($value) {
            return \App\Category::whereName($value)->firstOrFail();
        });

        $router->bind('city', function ($value) {
            return \App\City::whereCity($value)->firstOrFail();
        });

        $router->bind('country', function ($value) {
            return \App\Country::whereCountry($value)->firstOrFail();
        });

        $router->bind('language', function ($value) {
            return \App\Language::whereName($value)->firstOrFail();
        });
        
    }

    /**
     * Define the routes for the application.
     *
     * @param  \Illuminate\Routing\Router  $router
     * @return void
     */
    public function map(Router $router, Request $request)
    {
        //$this->mapWebRoutes($router);

        $this->mapPrefixRoutes($router, $request);

    }

    /**
     * Define the "web" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @param  \Illuminate\Routing\Router  $router
     * @return void
     */
    protected function mapWebRoutes(Router $router)
    {
        $router->group([
            'namespace' => $this->namespace, 'middleware' => 'web',
        ], function ($router) {
            require app_path('Http/routes.php');
        });
    }

    /**
     * Define the "localization" routes for the application.
     *
     * These routes all receive licalization prefix.
     *
     * @param  \Illuminate\Routing\Router  $router
     * @param  \Illuminate\Http\Request  $request
     * @return void
     */
    protected function mapPrefixRoutes(Router $router, Request $request)
    {
        $locale = $request->segment(1);
        $this->app->setLocale($locale);

        $router->group([
            'namespace' => $this->namespace, 'prefix' => $locale, 'middleware' => 'web',
        ], function ($router) {
            require app_path('Http/routes.php');
        });
    }
}
