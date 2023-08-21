<?php

namespace Cachet\Badger\Render;

use Cachet\Badger\Badge;
use Cachet\Badger\BadgeImage;

interface RenderInterface
{
    /**
     * Render a badge.
     */
    public function render(Badge $badge): BadgeImage;

    /**
     * Return a list of supported formats by the render.
     */
    public function getSupportedFormats(): array;
}
