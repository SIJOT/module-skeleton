<?php

namespace Idevelopment\Timecontrol\Api;

use Illuminate\Routing\Router;
use Illuminate\Support\ServiceProvider;

/**
 * Class ServiceProvider
 *
 * @package Idevelopment\Timecontrol\Api
 * @author  Tim Joosten <Topairy@gmail.com>
 * @license https://github.com/tjoosten/timecontrol-api/blob/master/LICENSE GNU
 * @link    https://github.com/tjoosten/timecontrol-api
 */
class ApiServiceProvider extends ServiceProvider
{
    // IDEA: Create a facade option for the API logs.
    // TODO: Build up the contributing file.
    // TODO: Document installation 
    // TODO: Create a readme.io portal for the docs. 
    // TODO: Document the routing. -> Docs folder. 
    // TODO: Document the routing. -> Source code. 
    // TODO: Set config values to specify what routes you need.

    /**
     * Bootstrap any application services.
     *
     * @return void.
     */
    public function boot()
    {
        // [Asset publishing]
        //
        // | Name:       | Command:                             | Description:                            | 
        // | ----------- | ------------------------------------ | --------------------------------------- |
        // | Factories   | php artisan vendor:publish Factories | Publish the database testing factories. |
        // | PHPUnit     | php artisan vendor:publish PHPUnit   | Publish the PHPUnit files.              |
        // | Config      | php artisan vendor:publish Config    | Publish the config file for the API.    |

        $this->publishes([__DIR__ . '/Factories' => database_path('factories')], 'Factories');
        $this->publishes([__DIR__ . '/Tests' => 'tests'], 'PHPUnit');
        $this->publishes([
            __DIR__ . '/Config/Timecontrol-api.php' => config_path('Timecontrol-api.php')
        ], 'Config');

        // Routing
        $routeConfig = [
            'namespace' => 'Idevelopment\Timecontrol\Api\Controllers',
            'prefix'    => $this->app['config']->get('Timecontrol-api.route_prefix'),
        ];

        $this->getRouter()->group($routeConfig, function($router) {
            // Profile routes
            $router->get('profile', 'ProfileController@getProfile');
            $router->post('profile/{id}', 'ProfileController@updateProfile');

            // Staff routes
            $router->get('staff', 'StaffController@all');
            $router->get('staff/{id}', 'StaffController@specific');
            $router->post('staff/create', 'StaffController@create');
            $router->patch('staff/update/{id}', 'StaffController@update');
            $router->delete('staff/destroy/{id}', 'StaffController@destroy');

            // Teams api.
            $router->get('teams', 'TeamController@all');
            $router->get('teams/{id}', 'TeamController@specific');
            $router->post('teams/create', 'TeamController@create');
            $router->patch('teams/update/{id}', 'TeamController@update');
            $router->delete('teams/destroy/{id}', 'TeamController@destroy');

            // Roles api.
            $router->get('roles', 'RoleController@all');
            $router->get('roles/{id}', 'RoleController@specific');
            $router->post('roles/create', 'RoleController@create');
            $router->patch('roles/update/{id}', 'RoleController@update');
            $router->delete('roles/destroy/{id}', 'RoleController@destroy');

            // Department routes.
            $router->get('departments', 'DepartmentsController@all');
            $router->get('departments/{id}', 'DepartmentsController@specific');
            $router->post('departments/create', 'DepartmentsController@create');
            $router->patch('departments/update/{id}', 'DepartmentsController@update');
            $router->delete('departments/destroy/{id}', 'DepartmentsController@destroy');
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