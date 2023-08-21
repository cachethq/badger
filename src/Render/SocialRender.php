<?php

namespace Cachet\Badger\Render;

use Cachet\Badger\Badge;
use Cachet\Badger\BadgeImage;

class SocialRender extends AbstractRender
{
    /**
     * Return a list of supported formats by the render.
     */
    public function getSupportedFormats(): array
    {
        return ['social'];
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
            'totalWidth' => ($subjectWidth + $statusWidth) + 7,
            'vendorColor' => $this->color,
            'valueColor' => $badge->hexColor(),
            'vendor' => $badge->subject(),
            'value' => $badge->status(),
            'vendorStartPosition' => round($subjectWidth / 2, 1) + 1,
            'valueStartPosition' => $subjectWidth + $statusWidth / 2 + 6,
            'arrowStartPosition' => $subjectWidth + 6,
            'arrowPathPosition' => $subjectWidth + 6.5,
        ];

        return $this->renderSvg($params, $badge->format());
    }

    /**
     * Returns the template contents.
     */
    protected function getTemplate(): string
    {
        return 'social.svg';
    }
}
