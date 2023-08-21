<?php

use Cachet\Badger\Badge;
use Cachet\Badger\Render\SocialRender;

it('can get supported formats', function () {
    $svgRender = getSvgRenderer(SocialRender::class);

    expect($svgRender->getSupportedFormats())->toMatchArray(['social']);
});

it('can render alt three awesome yellow green', function () {
    $svgRender = getSvgRenderer(SocialRender::class);
    $badge = new Badge('Alt Three', 'Awesome', 'yellowgreen', 'svg');
    $badgeImage = $svgRender->render($badge);

    expect($badgeImage)->toMatchSnapshot();
    expect($badgeImage->getFormat())->toBe('svg');
});

it('can render alt three dead red', function () {
    $svgRender = getSvgRenderer(SocialRender::class);
    $badge = new Badge('Alt Three', 'Dead', 'red', 'svg');
    $badgeImage = $svgRender->render($badge);

    expect($badgeImage)->toMatchSnapshot();
    expect($badgeImage->getFormat())->toBe('svg');
});
