<?php

namespace Cachet\Tests\Badger;

use Cachet\Badger\Facades\Badger;

it('can generate plastic badges', function () {
    $badge = Badger::generate('license', 'MIT', 'blue', 'plastic');

    expect($badge)->toMatchSnapshot();
});

it('can generate badges with a custom color', function () {
    $badge = Badger::generate('license', 'MIT', 'ff69b4', 'plastic');

    expect($badge)->toMatchSnapshot();
});

it('can generate badges from a string', function () {
    $badge = Badger::generateFromString('license-MIT-red.svg');

    expect($badge)->toMatchSnapshot();
});
