<?php

namespace Digila\Suite\Facades\Generater;

use Illuminate\Support\Facades\Facade;

class CodeFacade extends Facade
{
    /**
     * 
     */
    protected static function getFacadeAccessor()
    {
        return 'Digila\Suite\Generater\Code';
    }
}
