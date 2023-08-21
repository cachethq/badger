<?php

namespace Cachet\Badger\Render;

class PlasticRender extends AbstractRender
{
    /**
     * Return a list of supported formats by the render.
     */
    public function getSupportedFormats(): array
    {
        return ['svg', 'plastic'];
    }

    /**
     * Returns the template contents.
     */
    protected function getTemplate(): string
    {
        return 'plastic.svg';
    }
}
