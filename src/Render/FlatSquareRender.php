<?php

namespace Cachet\Badger\Render;

class FlatSquareRender extends AbstractRender
{
    /**
     * Return a list of supported formats by the render.
     */
    public function getSupportedFormats(): array
    {
        return ['flat-square'];
    }

    /**
     * Returns the template contents.
     */
    protected function getTemplate(): string
    {
        return 'flat-square.svg';
    }
}
