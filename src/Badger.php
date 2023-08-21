<?php

namespace Cachet\Badger;

use Cachet\Badger\Exceptions\InvalidRendererException;
use Cachet\Badger\Render\RenderInterface;

class Badger
{
    /**
     * The available renderers.
     *
     * @var \Cachet\Badger\Render\RenderInterface[]
     */
    protected array $renderers;

    /**
     * Create a new badger instance.
     *
     * @param  \Cachet\Badger\Render\RenderInterface[]  $renderers
     */
    public function __construct(array $renderers = null)
    {
        foreach ($renderers as $renderer) {
            $this->addRenderFormat($renderer);
        }
    }

    /**
     * Generates a badge.
     */
    public function generate(string $subject, string $status, string $color, string $format): BadgeImage
    {
        $badge = new Badge($subject, $status, $color, $format);

        return $this->getRendererForFormat($badge->format())->render($badge);
    }

    /**
     * Generates a badge from a string.
     *
     * Example: license-MIT-blue.svg
     */
    public function generateFromString(string $string): BadgeImage
    {
        $badge = Badge::fromString($string);

        return $this->getRendererForFormat($badge->format())->render($badge);
    }

    /**
     * Adds each renderer to its supported format.
     */
    protected function addRenderFormat(RenderInterface $renderer): void
    {
        foreach ($renderer->getSupportedFormats() as $format) {
            $this->renderers[$format] = $renderer;
        }
    }

    /**
     * Returns the renderer for the given format.
     *
     * @throws \Cachet\Badger\Exceptions\InvalidRendererException
     */
    protected function getRendererForFormat(string $format): RenderInterface
    {
        if (! isset($this->renderers[$format])) {
            throw new InvalidRendererException('No renders found for the given format: '.$format);
        }

        return $this->renderers[$format];
    }
}
