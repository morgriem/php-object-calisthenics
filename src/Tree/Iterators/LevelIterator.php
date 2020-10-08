<?php

namespace Morgriem\Calisthenics\Tree\Iterators;

use Morgriem\Calisthenics\Queue\Queue;
use Morgriem\Calisthenics\Tree\Node;
use Morgriem\Calisthenics\Tree\NodeIteratorInterface;

final class LevelIterator implements NodeIteratorInterface
{
    private Queue $queue;
    private Node $initial;

    public function __construct(Node $initial)
    {
        $this->initial = $initial;
        $this->rewind();
    }

    public function hasNext(): bool
    {
        return !$this->queue->isEmpty();
    }

    public function next(): Node
    {
        $node = $this->nextNodeInQueue();
        $this->iterateChildren($node);
        return $node;
    }

    public function rewind(): void
    {
        $this->queue = $this->makeQueue();
        $this->queue->push($this->initial);
    }

    protected function makeQueue(): Queue
    {
        return Queue::createEmpty();
    }

    private function nextNodeInQueue(): Node
    {
        return $this->queue->pop();
    }

    private function iterateChildren(Node $node): void
    {
        $this->queue->applyIterator($node->childrenIterator());
    }
}