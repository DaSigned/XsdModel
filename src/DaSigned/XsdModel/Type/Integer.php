<?php
/*
 * This file is part of the DaSigned Framework.
 *
 * (c) Michael Schneider <michael.schneider@dasined.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace DaSigned\XsdModel\Type;

use DaSigned\XsdModel\Type\Exception\InvalidArgumentException;

/**
 * Representation of Integer Number
 *
 * @author Michael Schneider <michael.schneider@dasined.de>
 */
class Integer
{
    private $lexicalRepresentationPattern = '/^[+-]?[0-9]+$/';

    /**
     * @param mixed $value
     *
     * @return int
     */
    public function sanitize($value)
    {
        if ($this->isValidType($value)) {
            return $value;
        }

        if (!$this->isValidFormat($value)) {
            throw new InvalidArgumentException(
                __METHOD__
                .': $value must match '.$this->lexicalRepresentationPattern
            );
        }

        return (int) $value;
    }

    /**
     * @param mixed $value
     *
     * @return bool
     */
    private function isValidType($value)
    {
        return is_int($value);
    }

    /**
     * @param mixed $value
     *
     * @return bool
     */
    private function isValidFormat($value)
    {
        return preg_match($this->lexicalRepresentationPattern, $value);
    }
}
