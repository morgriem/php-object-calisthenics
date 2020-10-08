<?php

namespace Morgriem\Calisthenics\Queue;

use Morgriem\Calisthenics\IteratorInterface;

class Queue
{
    private $items = [];

    public static function createEmpty(): self
    {
        return new self();
    }

    public function isEmpty(): bool {
        return count($this->items) === 0;
    }

    public function push(&$element): void
    {
        array_unshift($this->items, $element);
    }

    public function pop()
    {
        return array_pop($this->items);
    }

    public function applyIterator(IteratorInterface $it): void
    {
        $it->rewind();
        while ($it->hasNext()) {
            $element = $it->next();
            $this->push($element);
        }
    }
}