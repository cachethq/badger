<?php

namespace Cachet\Badger\Calculator;

interface TextSizeCalculatorInterface
{
    /**
     * The text size to use.
     *
     * @var int
     */
    const TEXT_SIZE = 11;

    /**
     * The external badge padding.
     *
     * @var int
     */
    const SHIELD_PADDING_EXTERNAL = 6;

    /**
     * The internal badge padding.
     *
     * @var int
     */
    const SHIELD_PADDING_INTERNAL = 4;

    /**
     * Calculate the width of the text box.
     */
    public function calculateWidth(string $text, int $size = null): float;
}
