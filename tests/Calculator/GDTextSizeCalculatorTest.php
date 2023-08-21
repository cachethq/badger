<?php

use Cachet\Badger\Calculator\GDTextSizeCalculator;

it('can calculate the width of text', function () {
    $calculator = new GDTextSizeCalculator(realpath(__DIR__.'/../../resources/fonts/DejaVuSans.ttf'));

    expect($calculator->calculateWidth('Alt Three'))->toBe(60.0);
});
