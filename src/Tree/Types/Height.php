<?php

namespace Morgriem\Calisthenics\Tree\Types;

use Morgriem\Calisthenics\Types\IntValue;

final class Height
{
    use IntValue;

    public static function zero(): self
    {
        return self::fromInt(0);
    }

    public function increase(): self
    {
        return self::fromInt($this->value + 1);
    }
}