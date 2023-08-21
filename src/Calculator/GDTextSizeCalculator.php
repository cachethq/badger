<?php

namespace Cachet\Badger\Calculator;

class GDTextSizeCalculator implements TextSizeCalculatorInterface
{
    /**
     * The path to the font file.
     */
    protected string $path;

    /**
     * Create a new gd text size calculator instance.
     */
    public function __construct(string $path)
    {
        $this->path = $path;
    }

    /**
     * Calculate the width of the text box.
     */
    public function calculateWidth(string $text, int $size = null): float
    {
        $size = round(($size ?: static::TEXT_SIZE) * 0.75, 1);
        $box = imagettfbbox($size, 0, $this->path, $text);

        return round(abs($box[2] - $box[0]) + static::SHIELD_PADDING_EXTERNAL + static::SHIELD_PADDING_INTERNAL, 1);
    }
}
