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

/**
 * Representation of Integer Number
 *
 * @author Michael Schneider <michael.schneider@dasined.de>
 */
class Integer
{
    /**
     * @var int
     */
    private $value = 0;

    /**
     * @return int
     */
    public function get()
    {
        return $this->value;
    }
}
