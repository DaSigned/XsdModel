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
     * @covers DaSigned\XsdModel\Type\Integer::get()
     */
    public function testGetAfterCreation()
    {
        $this->assertSame(0, $this->object->get());
    }

    public function testGetAfterSetFromString()
    {
        $this->assertSame(1, $this->object->set(1)->get());
    }

    public function testIfSetWithNonIntegerValueThrowsRightException()
    {
        try {
            $this->object->set('foo');
            $this->fail('Expected exception not thrown');
        } catch (\Exception $exc) {
            $namespace = 'DaSigned\\XsdModel\\Type\\Exception\\';
            $exceptionInterface = $namespace.'ExceptionInterface';
            $invalidArgumentException = $namespace.'InvalidArgumentException';

            $this->assertInstanceOf(
                $exceptionInterface,
                $exc,
                'Not an '.$exceptionInterface
            );

            $this->assertInstanceOf(
                $invalidArgumentException,
                $exc,
                'Not an '.$invalidArgumentException
            );
        }
    }
}
