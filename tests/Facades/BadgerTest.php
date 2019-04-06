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

namespace CachetHQ\Tests\Badger\Facades;

use CachetHQ\Badger\Badger as BadgerRoot;
use CachetHQ\Badger\Facades\Badger;
use CachetHQ\Tests\Badger\AbstractTestCase;
use GrahamCampbell\TestBenchCore\FacadeTrait;

/**
 * This badger facade test case class.
 *
 * @author James Brooks <james@alt-three.com>
 * @author Graham Campbell <graham@alt-three.com>
 */
class BadgerTest extends AbstractTestCase
{
    use FacadeTrait;

    /**
     * Get the facade accessor.
     *
     * @return string
     */
    protected function getFacadeAccessor()
    {
        return 'badger';
    }

    /**
     * Get the facade class.
     *
     * @return string
     */
    protected function getFacadeClass()
    {
        return Badger::class;
    }

    /**
     * Get the facade root.
     *
     * @return string
     */
    protected function getFacadeRoot()
    {
        return BadgerRoot::class;
    }
}
