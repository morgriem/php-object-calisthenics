<?php

namespace Morgriem\Calisthenics\Tree\Exceptions;

use Morgriem\Calisthenics\ExceptionInterface;
use Morgriem\Calisthenics\Tree\Node;

final class ChildInsertFailed extends \RuntimeException implements ExceptionInterface
{
    private Node $parent;
    private ?Node $child;

    public function __construct(Node $parent, ?Node $child = null, $message = "", $code = 0, \Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
        $this->parent = $parent;
        $this->child = $child;
    }

    public static function cannotHaveMoreChildren(Node $parent): self
    {
        return new self($parent, null, "Child insert failed: parent node can't have children.", ExceptionInterface::NODE_CANT_HAVE_MORE_CHILDREN);
    }
}