<?php

namespace Digila\Suite\Facades\Generater;

use Illuminate\Support\Facades\Facade;

class SnowflakeFacade extends Facade
{
    /**
     * 
     */
    protected static function getFacadeAccessor()
    {
        return 'Digila\Suite\Generater\Snowflake';
    }
}
