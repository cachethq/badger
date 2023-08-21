<?php

namespace Cachet\Badger\Facades;

use Illuminate\Support\Facades\Facade;

class Badger extends Facade
{
    /**
     * Get the facade accessor.
     */
    protected static function getFacadeAccessor(): string
    {
        return 'badger';
    }
}
