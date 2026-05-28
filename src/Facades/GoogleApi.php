<?php

namespace TomShaw\GoogleApi\Facades;

use Illuminate\Support\Facades\Facade;
use TomShaw\GoogleApi\GoogleApiManager;

/**
 * @mixin GoogleApiManager
 */
class GoogleApi extends Facade
{
    public static function getFacadeAccessor(): string
    {
        return GoogleApiManager::class;
    }
}
