<?php

namespace Morgriem\Calisthenics;

use Morgriem\Calisthenics\Tree\Node;

interface IteratorInterface
{
    public function hasNext(): bool;
    public function next(): Node;
    public function rewind(): void;
}