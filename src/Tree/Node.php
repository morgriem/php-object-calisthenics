<?php

namespace Morgriem\Calisthenics\Tree;

use Morgriem\Calisthenics\Tree\Exceptions\ChildInsertFailed;
use Morgriem\Calisthenics\Tree\Types\Height;
use Morgriem\Calisthenics\Tree\Types\Label;
use Morgriem\Calisthenics\Tree\Types\Size;

final class Node
{
    private Label $label;

    private NodeCollection $children;

    public function __construct(Label $label)
    {
        $this->label = $label;
        $this->children = $this->makeChildren();
    }

    public function height(): Height
    {
        if ($this->children->isEmpty()) {
            return Height::zero();
        }
        return $this->maxChildrenHeight()->increase();
    }

    public function addChild(self $child): void
    {
        if ($this->cannotHaveChildren()) {
            throw ChildInsertFailed::cannotHaveMoreChildren($this);
        }
        $this->children->add($child);
    }

    public function canHaveChildren(): bool
    {
        return !Size::fromInt(2)->lessThan($this->children->size());
    }

    public function childrenIterator(): NodeIteratorInterface
    {
        return $this->children;
    }

    protected function makeChildren(): NodeCollection
    {
        return new NodeCollection();
    }

    private function cannotHaveChildren(): bool
    {
        return !$this->canHaveChildren();
    }

    private function maxChildrenHeight(): Height
    {
        return $this->children->maxHeight();
    }
}