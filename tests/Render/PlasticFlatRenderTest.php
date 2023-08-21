<?php

use Cachet\Badger\Badge;
use Cachet\Badger\Render\PlasticFlatRender;

it('can get supported formats', function () {
    $svgRender = getSvgRenderer(PlasticFlatRender::class);

    expect($svgRender->getSupportedFormats())->toMatchArray(['plastic-flat', 'flat']);
});

it('can render alt three awesome bright green', function () {
    $svgRender = getSvgRenderer(PlasticFlatRender::class);
    $badge = new Badge('Alt Three', 'Awesome', 'brightgreen', 'svg');
    $badgeImage = $svgRender->render($badge);

    expect($badgeImage)->toMatchSnapshot();
    expect($badgeImage->getFormat())->toBe('svg');
});

it('can render alt three dead red', function () {
    $svgRender = getSvgRenderer(PlasticFlatRender::class);
    $badge = new Badge('Alt Three', 'Dead', 'red', 'svg');
    $badgeImage = $svgRender->render($badge);

    expect($badgeImage)->toMatchSnapshot();
    expect($badgeImage->getFormat())->toBe('svg');
});
