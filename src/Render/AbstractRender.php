<?php

namespace Cachet\Badger\Render;

use Cachet\Badger\Badge;
use Cachet\Badger\BadgeImage;
use Cachet\Badger\Calculator\TextSizeCalculatorInterface;

abstract class AbstractRender implements RenderInterface
{
    /**
     * The text size calculator instance.
     */
    protected TextSizeCalculatorInterface $calculator;

    /**
     * The path to the template folder.
     */
    protected string $path;

    /**
     * The vendor color of the badge.
     */
    protected string $color;

    /**
     * Create a new svg render instance.
     */
    public function __construct(TextSizeCalculatorInterface $calculator, string $path, string $color = null)
    {
        $this->calculator = $calculator;
        $this->path = $path;
        $this->color = $color ?: '#555555';
    }

    /**
     * Render a badge.
     */
    public function render(Badge $badge): BadgeImage
    {
        $subjectWidth = $this->stringWidth($badge->subject());
        $statusWidth = $this->stringWidth($badge->status());

        $params = [
            'vendorWidth' => $subjectWidth,
            'valueWidth' => $statusWidth,
            'totalWidth' => $subjectWidth + $statusWidth,
            'vendorColor' => $this->color,
            'valueColor' => $badge->hexColor(),
            'vendor' => $badge->subject(),
            'value' => $badge->status(),
            'vendorStartPosition' => round($subjectWidth / 2, 1) + 1,
            'valueStartPosition' => $subjectWidth + round($statusWidth / 2, 1) - 1,
        ];

        return $this->renderSvg($params, $badge->format());
    }

    /**
     * Calculate the width of a string.
     */
    protected function stringWidth(string $text): float
    {
        return $this->calculator->calculateWidth($text);
    }

    /**
     * Render the badge from the parameters and format given.
     */
    protected function renderSvg(array $params, string $format): BadgeImage
    {
        $template = file_get_contents($this->path.'/'.$this->getTemplate());

        foreach ($params as $key => $param) {
            $template = str_replace(sprintf('{{ %s }}', $key), $param, $template);
        }

        return BadgeImage::createFromString($template, $format);
    }
}
