<?php

namespace Morgriem\Calisthenics\Tests\Tree;

use Morgriem\Calisthenics\Tests\Types\IntValueTest;
use Morgriem\Calisthenics\Tree\Types\Label;
use PHPUnit\Framework\TestCase;

class LabelTest extends TestCase
{
    use IntValueTest;

    private function makeTestObject(int $value): Label
    {
        return Label::fromInt($value);
    }
}