<?php

use Cachet\Badger\Calculator\GDTextSizeCalculator;
use Cachet\Tests\Badger\TestCase;

uses(TestCase::class)->in(__DIR__);

function getSvgRenderer(string $render)
{
    $base = __DIR__.'/../resources/';

    $calculator = new GDTextSizeCalculator(realpath($base.'fonts/DejaVuSans.ttf'));
    $path = $base.'templates';

    return new $render($calculator, realpath($path));
}
