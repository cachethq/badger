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

namespace CachetHQ\Badger\Render;

use CachetHQ\Badger\Badge;

/**
 * This is the render interface.
 *
 * @author James Brooks <james@alt-three.com>
 */
interface RenderInterface
{
    /**
     * Render a badge.
     *
     * @param \CachetHQ\Badger\Badge $badge
     *
     * @return \CachetHQ\Badger\BadgeImage
     */
    public function render(Badge $badge);

    /**
     * Return a list of supported formats by the render.
     *
     * @return string[]
     */
    public function getSupportedFormats();
}
