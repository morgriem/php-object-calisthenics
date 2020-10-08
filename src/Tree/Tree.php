<?php

namespace Morgriem\Calisthenics\Tree;

use Morgriem\Calisthenics\Tree\Exceptions\NodeNotFound;
use Morgriem\Calisthenics\Tree\Iterators\LevelIterator;
use Morgriem\Calisthenics\Tree\Searches\BalancedPlaceForNewNode;
use Morgriem\Calisthenics\Tree\Types\Height;
use Morgriem\Calisthenics\Tree\Types\Label;

final class Tree
{
    private Node $root;

    public function __construct(Label $root)
    {
        $this->root = $this->makeNode($root);
    }

    public function height(): Height
    {
        return $this->root->height();
    }

    public function addChild(Label $label): void
    {
        $parent = $this->selectParentForNewNode();
        $parent->addChild($this->makeNode($label));
    }

    protected function makeNode(Label $label): Node
    {
        return new Node($label);
    }

    protected function selectParentForNewNode(): Node
    {
        $iterator = new LevelIterator($this->root);
        $search = new BalancedPlaceForNewNode($iterator);
        $parent = $search->execute();
        if (null === $parent) {
            throw NodeNotFound::forInsertInBalancedTree($this);
        }
        return $parent;
    }
}