<?php

namespace Morgriem\Calisthenics\Tree\Exceptions;

use Morgriem\Calisthenics\ExceptionInterface;
use Morgriem\Calisthenics\Tree\Tree;
use Throwable;

final class NodeNotFound extends \LogicException implements ExceptionInterface
{
    private Tree $tree;

    public function __construct(Tree $tree, string $message = "", $code = 0, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
        $this->tree = $tree;
    }

    public static function forInsertInBalancedTree(Tree $tree): self
    {
        return new self($tree, "Place for child insert not found in balanced tree.", ExceptionInterface::BALANCED_TREE_INSERT_PLACE_NOT_FOUND);
    }
}