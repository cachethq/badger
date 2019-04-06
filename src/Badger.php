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

namespace CachetHQ\Badger;

use CachetHQ\Badger\Exceptions\InvalidRendererException;
use CachetHQ\Badger\Render\RenderInterface;

/**
 * This is the badger class.
 *
 * @author James Brooks <james@alt-three.com>
 */
class Badger
{
    /**
     * The available renderers.
     *
     * @var \CachetHQ\Badger\Render\RenderInterface[]
     */
    protected $renderers;

    /**
     * Create a new badger instance.
     *
     * @param \CachetHQ\Badger\Render\RenderInterface[] $renderers
     *
     * @return void
     */
    public function __construct(array $renderers)
    {
        foreach ($renderers as $renderer) {
            $this->addRenderFormat($renderer);
        }
    }

    /**
     * Generates a badge.
     *
     * @param string $subject
     * @param string $status
     * @param string $color
     * @param string $format
     *
     * @return \CachetHQ\Badger\BadgeImage
     */
    public function generate(string $subject, string $status, string $color, string $format)
    {
        $badge = new Badge($subject, $status, $color, $format);

        return $this->getRendererForFormat($badge->getFormat())->render($badge);
    }

    /**
     * Generates a badge from a string.
     *
     * Example: license-MIT-blue.svg
     *
     * @param string $string
     *
     * @return \CachetHQ\Badger\BadgeImage
     */
    public function generateFromString(string $string)
    {
        $badge = Badge::fromString($string);

        return $this->getRendererForFormat($badge->getFormat())->render($badge);
    }

    /**
     * Adds each renderer to its supported format.
     *
     * @param \CachetHQ\Badger\Render\RenderInterface $renderer
     *
     * @return void
     */
    protected function addRenderFormat(RenderInterface $renderer)
    {
        foreach ($renderer->getSupportedFormats() as $format) {
            $this->renderers[$format] = $renderer;
        }
    }

    /**
     * Returns the renderer for the given format.
     *
     * @param string $format
     *
     * @throws \CachetHQ\Badger\Exceptions\InvalidRendererException
     *
     * @return \CachetHQ\Badger\Render\RenderInterface
     */
    protected function getRendererForFormat(string $format)
    {
        if (!isset($this->renderers[$format])) {
            throw new InvalidRendererException('No renders found for the given format: '.$format);
        }

        return $this->renderers[$format];
    }
}
