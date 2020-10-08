<?php

namespace Morgriem\Calisthenics\Types;

trait IntValue
{
    private int $value;

    public function __construct(int $value)
    {
        $this->value = $value;
    }

    public static function fromInt(int $value): self
    {
        return new self($value);
    }

    public function equals(self $other): bool
    {
        //preserves structural encapsulation of $other
        return $other->equalsToInt($this->value);
    }

    public function equalsToInt(int $number): bool
    {
        return $this->value === $number;
    }

    public function lessThan(self $other): bool
    {
        return !$other->lessThanInt($this->value);
    }

    public function lessThanInt(int $number): bool
    {
        return $this->value < $number;
    }

    public static function maximumOf($first, $second): self {
        if ($first->lessThan($second)) {
            return $second;
        }
        return $first;
    }
}