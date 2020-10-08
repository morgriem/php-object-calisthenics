<?php

namespace Morgriem\Calisthenics\Tree;

use Morgriem\Calisthenics\Tree\Types\Height;
use Morgriem\Calisthenics\Tree\Types\Size;

final class NodeCollection implements NodeIteratorInterface
{
    /**
     * @var Node[]
     */
    private array $nodes = [];

    public function add(Node $node): void
    {
        $this->nodes[] = $node;
    }

    public function size(): Size
    {
        return Size::fromInt(count($this->nodes));
    }

    public function maxHeight(): Height
    {
        $max = Height::zero();
        foreach ($this->nodes as $node) {
            $max = Height::maximumOf($max, $node->height());
        }
        return $max;
    }

    public function isEmpty(): bool
    {
        return $this->size()->equals(Size::fromInt(0));
    }

    public function hasNext(): bool
    {
        return key($this->nodes) !== null;
    }

    public function rewind(): void
    {
        reset($this->nodes);
    }

    public function next(): Node
    {
        $result = current($this->nodes);
        next($this->nodes);
        return $result;
    }
}