<?php

namespace Morgriem\Calisthenics\Tree\Types;

use Morgriem\Calisthenics\Types\IntValue;

final class Label
{
    use IntValue;

    public static function random(int $min = 0, int $max = null): self
    {
        return new self(rand($min, $max));
    }
}