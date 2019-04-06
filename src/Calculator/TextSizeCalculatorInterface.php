<?php

declare(strict_types=1);

/*
 * This file is part of Cachet Badger.
 *
 * (c) apilayer GmbH
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace CachetHQ\Badger\Calculator;

/**
 * This is the text size calculator interface.
 *
 * @author James Brooks <james@alt-three.com>
 * @author Graham Campbell <graham@alt-three.com>
 */
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
     *
     * @param string   $text
     * @param int|null $size
     *
     * @return float
     */
    public function calculateWidth(string $text, int $size = null);
}
