<?php

/**
 * This file is part of PHPPresentation - A pure PHP library for reading and writing
 * presentations documents.
 *
 * PHPPresentation is free software distributed under the terms of the GNU Lesser
 * General Public License version 3 as published by the Free Software Foundation.
 *
 * For the full copyright and license information, please read the LICENSE
 * file that was distributed with this source code. For the full list of
 * contributors, visit https://github.com/PHPOffice/PHPPresentation/contributors.
 *
 * @see        https://github.com/PHPOffice/PHPPresentation
 *
 * @license     http://www.gnu.org/licenses/lgpl.txt LGPL version 3
 */

declare(strict_types=1);

namespace PhpOffice\PhpPresentation\Style;

use PhpOffice\PhpPresentation\ComparableInterface;

/**
 * \PhpOffice\PhpPresentation\Style\Outline.
 */
class Outline implements ComparableInterface
{
    /**
     * @var Fill
     */
    protected $fill;

    /**
     * @var int
     */
    protected $width = 1;

    /**
     * Hash index.
     *
     * @var int
     */
    protected $hashIndex;

    public function __construct()
    {
        $this->fill = new Fill();
    }

    public function getFill(): Fill
    {
        return $this->fill;
    }

    public function setFill(Fill $fill): self
    {
        $this->fill = $fill;

        return $this;
    }

    /**
     * Value in pixels.
     */
    public function getWidth(): int
    {
        return $this->width;
    }

    /**
     * Value in pixels.
     */
    public function setWidth(int $pValue = 1): self
    {
        $this->width = $pValue;

        return $this;
    }

    /**
     * Set outline as a solid fill.
     *
     * @param string $color ARGB or RGB color
     * @param null|int $width Width in pixels
     * @return $this
     */
    public function setSolid(string $color, ?int $width = null): self
    {
        $this->getFill()->setFillType(Fill::FILL_SOLID);
        $this->getFill()->setStartColor(new Color($color));
        if (null !== $width) {
            $this->setWidth($width);
        }

        return $this;
    }

    /**
     * Get hash code.
     *
     * @return string Hash code
     */
    public function getHashCode(): string
    {
        return md5(
            $this->fill->getHashCode()
            . $this->width
            . __CLASS__
        );
    }

    /**
     * Get hash index.
     *
     * @return null|int Hash index
     */
    public function getHashIndex(): ?int
    {
        return $this->hashIndex;
    }

    /**
     * Set hash index.
     *
     * @param int $value Hash index
     *
     * @return $this
     */
    public function setHashIndex(int $value)
    {
        $this->hashIndex = $value;

        return $this;
    }
}
