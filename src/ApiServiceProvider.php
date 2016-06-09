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
        // Asset publishing
        $this->publishes([__DIR__ . '../tests' => 'tests'], 'PHPUnit');
        $this->publishes([
            __DIR__ . '/Config/Timecontrol-api.php' => config_path('Timecontrol-api.php')
        ], 'config');

        // Routing
        $routeConfig = [
            'namespace' => 'Idevelopment\Timecontrol\Api\Controllers',
            'prefix' => $this->app['config']->get('Timecontrol-api.route_prefix'),
        ];

        $this->getRouter()->group($routeConfig, function($router) {
            // Profile routes
            $router->get('profile', 'ProfileController@getProfile');

            // Staff routes
            $router->get('staff', 'StaffController@all');
            $router->get('staff/{id}', 'StaffController@specific');
            $router->post('staff/create', 'StaffController@create');
            $router->patch('staff/update/{id}', 'StaffController@update');
            $router->delete('staff/destroy/{id}', 'StaffController@destroy');

            // Roles api.

            // Department routes

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