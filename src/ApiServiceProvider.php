<?php

namespace Idevelopment\Timecontrol\Api;

use Illuminate\Support\ServiceProvider;

/**
 * Class ServiceProvider
 * @package Idevelopment\Timecontrol\Api
 */
class ApiServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void.
     */
    public function boot()
    {
        if (! $this->app->routesAreCached()) {
            require __DIR__ . 'Routes.php';
        }
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