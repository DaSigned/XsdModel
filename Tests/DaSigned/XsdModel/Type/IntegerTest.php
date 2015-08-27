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
     * @covers DaSigned\XsdModel\Type\Integer::sanitize()
     * @covers DaSigned\XsdModel\Type\Integer::isValidType()
     */
    public function testSanitizeWithIntValue()
    {
        $this->assertSame(123, $this->object->sanitize(123));
    }

    /**
     * @dataProvider validStringProvider
     *
     * @param string $string
     * @param int    $expectedInt
     *
     * @covers DaSigned\XsdModel\Type\Integer::sanitize()
     * @covers DaSigned\XsdModel\Type\Integer::isValidFormat()
     */
    public function testSanitizeWithValidString($string, $expectedInt)
    {
        $this->assertSame($expectedInt, $this->object->sanitize($string));
    }

    /**
     * Provides arrays of valid strings with correspondig integer values
     *
     * @return array[]
     */
    public function validStringProvider()
    {
        return array(
            array('0', 0),
            array('123', 123),
            array('123', 123),
            array('+2', 2),
            array('-3', -3),
            array('00', 0),
            array('001', 1),
            array('+02', 2),
            array('-03', -3),
        );
    }

    /**
     * @dataProvider validNonIntProvider
     *
     * @param mixed $intAsString
     * @param int   $expectedInt
     *
     * @covers DaSigned\XsdModel\Type\Integer::sanitize()
     * @covers DaSigned\XsdModel\Type\Integer::isValidFormat()
     */
    public function testSanitizeWithValidNonIntValues($mixed, $expectedInt)
    {
        $this->assertSame($expectedInt, $this->object->sanitize($mixed));
    }

    /**
     * Provides arrays of valid non integers with correspondig integer values
     *
     * @return array[]
     */
    public function validNonIntProvider()
    {
        return array(
            array(true, 1),
            array(.0, 0),
            array(2.0, 2),
            array(-3.0, -3),
        );
    }

    public function _testGetAfterSetFromString()
    {
        $this->assertSame(1, $this->object->set(1)->get());
    }

    /**
     * @covers DaSigned\XsdModel\Type\Integer::get()
     * @covers DaSigned\XsdModel\Type\Integer::checkType()
     */
    public function _testIfSetWithNonIntegerValueThrowsRightException()
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
