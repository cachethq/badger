<?php

declare(strict_types=1);

/*
 * This file is part of Cachet Badger.
 *
 * (c) apilayer GmbH
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace CachetHQ\Badger\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * This is the badger facade class.
 *
 * @author James Brooks <james@alt-three.com>
 */
class Badger extends Facade
{
    /**
     * Get the facade accessor.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'badger';
    }
}
