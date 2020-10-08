<?php

namespace Morgriem\Calisthenics\Tests\Tree;

use Morgriem\Calisthenics\Tests\Types\IntValueTest;
use PHPUnit\Framework\TestCase;
use Morgriem\Calisthenics\Tree\Types\Height;

class HeightTest extends TestCase
{
    use IntValueTest;

    private function makeTestObject(int $value): Height
    {
        return Height::fromInt($value);
    }
}