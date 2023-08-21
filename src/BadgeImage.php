<?php

namespace Cachet\Badger;

class BadgeImage
{
    /**
     * The content of the image.
     */
    protected string $content;

    /**
     * The format of the image.
     */
    protected string $format;

    /**
     * Create a new badge image instance.
     */
    public function __construct(string $content, string $format)
    {
        $this->content = $content;
        $this->format = $format;
    }

    /**
     * Returns the content of the badge image as a string.
     */
    public function __toString(): string
    {
        return $this->content;
    }

    /**
     * Creates a new badge image from a given string.
     */
    public static function createFromString(string $content, string $format): self
    {
        return new self($content, $format);
    }

    /**
     * Returns the format of the image.
     */
    public function getFormat(): string
    {
        return $this->format;
    }
}
