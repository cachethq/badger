<?php

namespace Cachet\Badger;

use Cachet\Badger\Exceptions\InvalidHexColorException;
use InvalidArgumentException;

class Badge
{
    /**
     * The left side of the badge.
     */
    protected string $subject;

    /**
     * The right side of the badge.
     */
    protected string $status;

    /**
     * The color of the badge.
     */
    protected string $color;

    /**
     * The format of the badge.
     */
    protected string $format;

    /**
     * The default colors to map strings to.
     */
    protected array $colorMap = [
        'brightgreen' => '4c1',
        'green' => '97CA00',
        'yellow' => 'dfb317',
        'yellowgreen' => 'a4a61d',
        'orange' => 'fe7d37',
        'red' => 'e05d44',
        'blue' => '007ec6',
        'grey' => '555',
        'gray' => '555',
        'lightgrey' => '9f9f9f',
        'lightgray' => '9f9f9f',
    ];

    /**
     * The default format to render the badge as.
     *
     * @var string
     */
    const DEFAULT_FORMAT = 'flat-square';

    /**
     * Create a new badge instance.
     *
     * @throws \Cachet\Badger\Exceptions\InvalidHexColorException
     */
    public function __construct(string $subject, string $status, string $color, string $format = null)
    {
        $this->subject = htmlspecialchars($subject, ENT_XML1, 'UTF-8');
        $this->status = htmlspecialchars($status, ENT_XML1, 'UTF-8');
        $this->color = $this->colorMapOrAsHex($color);
        $this->format = $format ?: static::DEFAULT_FORMAT;

        if (! $this->isValidHex($this->color)) {
            throw new InvalidHexColorException('The color argument "'.$this->color.'" is invalid.');
        }
    }

    /**
     * Generates a badge from a string format.
     *
     * Example: I_m-liuggio-yellow.svg
     */
    public static function fromString(string $format): Badge
    {
        if (preg_match('/^(([^-]|--)+)-(([^-]|--)+)-(([^-]|--)+)\.(svg|png|gif|jpg)$/', $format, $match) === false && (7 != count($match))) {
            throw new InvalidArgumentException('The given format string is invalid: '.$format);
        }

        $subject = $match[1];
        $status = $match[3];
        $color = $match[5];
        $format = $match[7];

        return new self($subject, $status, $color, $format);
    }

    /**
     * Get the subject.
     */
    public function subject(): string
    {
        return $this->subject;
    }

    /**
     * Get the status.
     */
    public function status(): string
    {
        return $this->status;
    }

    /**
     * Get the color.
     */
    public function color(): string
    {
        return ltrim($this->color, '#');
    }

    /**
     * Get the color with the prefixed #.
     */
    public function hexColor(): string
    {
        return '#'.$this->color();
    }

    /**
     * Get the format.
     */
    public function format(): string
    {
        return $this->format;
    }

    /**
     * Generate the badge as a string.
     */
    public function __toString(): string
    {
        return sprintf('%s-%s-%s.%s',
            $this->subject,
            $this->status,
            $this->color,
            $this->format
        );
    }

    /**
     * Determine if the color is within the color map, or return it as normal.
     */
    protected function colorMapOrAsHex(string $color): string
    {
        return isset($this->colorMap[$color]) ? $this->colorMap[$color] : $color;
    }

    /**
     * Determine if the given color is a valid hex code.
     */
    protected function isValidHex(string $color): bool
    {
        $color = ltrim($color, '#'); // Strip the leading #

        return (bool) preg_match('/^[0-9a-fA-F]{3,6}$/', $color);
    }
}
