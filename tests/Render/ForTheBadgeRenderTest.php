<?php

use Cachet\Badger\Badge;
use Cachet\Badger\Render\ForTheBadgeRender;

it('can get supported formats', function () {
    $svgRender = getSvgRenderer(ForTheBadgeRender::class);

    expect($svgRender->getSupportedFormats())->toMatchArray(['for-the-badge']);
});

it('can render alt three awesome bright green', function () {
    $svgRender = getSvgRenderer(ForTheBadgeRender::class);
    $badge = new Badge('Alt Three', 'Awesome', 'brightgreen', 'svg');
    $badgeImage = $svgRender->render($badge);

    expect($badgeImage)->toMatchSnapshot();
    expect($badgeImage->getFormat())->toBe('svg');
});

it('uppercases text without corrupting xml entities', function () {
    $svgRender = getSvgRenderer(ForTheBadgeRender::class);
    $badge = new Badge('R&D', 'A<B', 'blue', 'svg');
    $badgeImage = $svgRender->render($badge);

    expect((string) $badgeImage)->toContain('R&amp;D');
    expect((string) $badgeImage)->toContain('A&lt;B');
});

it('can render alt three dead red', function () {
    $svgRender = getSvgRenderer(ForTheBadgeRender::class);
    $badge = new Badge('Alt Three', 'Dead', 'red', 'svg');
    $badgeImage = $svgRender->render($badge);

    expect($badgeImage)->toMatchSnapshot();
    expect($badgeImage->getFormat())->toBe('svg');
});
