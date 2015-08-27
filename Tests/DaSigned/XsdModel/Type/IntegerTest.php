<?php
/*
 * This file is part of the DaSigned Framework.
 *
 * (c) $(user)
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace DaSigned\XsdModel\Type;

/**
 * Tests public Integer methods (interface).
 *
 * @author Michael Schneider <michael.schneider@dasined.de>
 */
class IntegerTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var Integer
     */
    protected $object;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp()
    {
        $this->object = new Integer();
    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown()
    {

    }

    /**
     * @covers DaSigned\XsdModel\Type\Integer::get()
     */
    public function testGetAfterCreation()
    {
        $this->assertSame(0, $this->object->get());
    }
}
