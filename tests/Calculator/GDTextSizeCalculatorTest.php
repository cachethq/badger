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

namespace CachetHQ\Tests\Badger\Calculator;

use CachetHQ\Badger\Calculator\GDTextSizeCalculator;
use GrahamCampbell\TestBench\AbstractTestCase;

/**
 * This is the gd text size calculator test case class.
 *
 * @author James Brooks <james@alt-three.com>
 * @author Graham Campbell <graham@alt-three.com>
 */
class GDTextSizeCalculatorTest extends AbstractTestCase
{
    public function testCalculateWidth()
    {
        $calculator = new GDTextSizeCalculator(realpath(__DIR__.'/../../resources/fonts/DejaVuSans.ttf'));

        $this->assertSame(62.0, $calculator->calculateWidth('Alt Three'));
    }
}
