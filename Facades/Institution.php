<?php

namespace Luanardev\Modules\Institution\Facades;
use Illuminate\Support\Facades\Facade;

class Institution extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'institution';
    }

}

