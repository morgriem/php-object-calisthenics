<?php

namespace Morgriem\Calisthenics\Tests\Types;

trait IntValueTest
{
    abstract public function makeTestObject(int $value);

    public function testSameValuesAreEqual()
    {
        $first = $this->makeTestObject(123);
        $second = $this->makeTestObject(123);

        $this->assertTrue($first->equals($second));
    }

    public function testDifferentValuesAreNotEqual()
    {
        $first = $this->makeTestObject(123);
        $second = $this->makeTestObject(456);

        $this->assertFalse($first->equals($second));
    }

    public function testEqualsToSameInt()
    {
        $number = 123;
        $value = $this->makeTestObject($number);

        $this->assertTrue($value->equalsToInt($number));
    }

    public function testNotEqualsToDifferentInt()
    {
        $value = $this->makeTestObject(123);
        $this->assertFalse($value->equalsToInt(456));
    }
}