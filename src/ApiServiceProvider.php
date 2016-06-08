<?php

namespace Idevelopment\Timecontrol\Api;

use Illuminate\Routing\Router;
use Illuminate\Support\ServiceProvider;

/**
 * Class ServiceProvider
 * @package Idevelopment\Timecontrol\Api
 */
class ApiServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void.
     */
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/Config/Timecontrol-api.php' => config_path('Timecontrol-api.php')
        ], 'config');

        $routeConfig = [
            'namespace' => 'Idevelopment\Timecontrol\Api\Controllers',
            'prefix' => $this->app['config']->get('Timecontrol-api.route_prefix'),
        ];

        $this->getRouter()->group($routeConfig, function($router) {
            $router->get('profile', 'ProfileController@getProfile');
        });
    }

    /**
     * Get the active router.
     *
     * @return Router
     */
    protected function getRouter()
    {
        return $this->app['router'];
    }

    /**
     * Register any application services.
     *
     * @return void.
     */
    public function register()
    {

    }
}