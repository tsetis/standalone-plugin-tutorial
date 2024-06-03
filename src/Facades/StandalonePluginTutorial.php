<?php

namespace Tsetis\StandalonePluginTutorial\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Tsetis\StandalonePluginTutorial\StandalonePluginTutorial
 */
class StandalonePluginTutorial extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \Tsetis\StandalonePluginTutorial\StandalonePluginTutorial::class;
    }
}
