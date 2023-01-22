<?php

namespace EdwardAlgorist\WorldTime\Facades;

use Illuminate\Support\Facades\Facade;

class WorldTime extends Facade
{

    protected static function getFacadeAccessor()
    {
        return 'world-time';
    }

}