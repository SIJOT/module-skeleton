<?php

namespace Idevelopment\Timecontrol\Api\Facade;

use Illuminate\Support\Facades\Facade;

/**
 * Class TimecontrolApi
 * @package Idevelopment\Timecontrol\Api\Facade
 */
class TimecontrolApi extends Facade
{
    /**
     * Register the facade.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'TimecontrolApi';
    }
}