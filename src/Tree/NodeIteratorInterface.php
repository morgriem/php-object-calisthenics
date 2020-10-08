<?php

namespace Morgriem\Calisthenics\Tree;

use Morgriem\Calisthenics\IteratorInterface;

interface NodeIteratorInterface extends IteratorInterface
{
    public function next(): Node;
}