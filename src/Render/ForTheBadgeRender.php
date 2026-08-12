<?php

namespace Cachet\Badger\Render;

use Cachet\Badger\Badge;
use Cachet\Badger\BadgeImage;

class ForTheBadgeRender extends AbstractRender
{
    /**
     * The additional horizontal padding applied to each section.
     */
    protected const EXTRA_PADDING = 10;

    /**
     * The extra width added per character by the template's letter spacing.
     */
    protected const LETTER_SPACING = 1;

    /**
     * Return a list of supported formats by the render.
     */
    public function getSupportedFormats(): array
    {
        return ['for-the-badge'];
    }

    /**
     * Render a badge.
     */
    public function render(Badge $badge): BadgeImage
    {
        $subject = $this->uppercase($badge->subject());
        $status = $this->uppercase($badge->status());

        $subjectWidth = $this->sectionWidth($subject);
        $statusWidth = $this->sectionWidth($status);

        $params = [
            'vendorWidth' => $subjectWidth,
            'valueWidth' => $statusWidth,
            'totalWidth' => $subjectWidth + $statusWidth,
            'vendorColor' => $this->color,
            'valueColor' => $badge->hexColor(),
            'vendor' => $subject,
            'value' => $status,
            'vendorStartPosition' => round($subjectWidth / 2, 1) + 1,
            'valueStartPosition' => $subjectWidth + round($statusWidth / 2, 1) - 1,
        ];

        return $this->renderSvg($params, $badge->format());
    }

    /**
     * Uppercase already XML-escaped text without corrupting its entities.
     */
    protected function uppercase(string $text): string
    {
        return htmlspecialchars(
            mb_strtoupper(htmlspecialchars_decode($text, ENT_XML1)),
            ENT_XML1,
            'UTF-8'
        );
    }

    /**
     * Calculate the width of a badge section, accounting for letter spacing and padding.
     */
    protected function sectionWidth(string $text): float
    {
        return $this->stringWidth($text) + (mb_strlen($text) * self::LETTER_SPACING) + self::EXTRA_PADDING;
    }

    /**
     * Returns the template contents.
     */
    protected function getTemplate(): string
    {
        return 'for-the-badge.svg';
    }
}
