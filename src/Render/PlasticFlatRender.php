<?php

namespace Cachet\Badger\Render;

class PlasticFlatRender extends AbstractRender
{
    /**
     * Return a list of supported formats by the render.
     */
    public function getSupportedFormats(): array
    {
        return ['plastic-flat', 'flat'];
    }

    /**
     * Returns the template contents.
     */
    protected function getTemplate(): string
    {
        return 'plastic-flat.svg';
    }
}
