<?php

namespace Morgriem\Calisthenics\Tree;

abstract class Search
{
    private NodeIteratorInterface $it;
    private ?Node $result = null;

    public function __construct(NodeIteratorInterface $it)
    {
        $this->it = $it;
    }

    public function execute(): ?Node
    {
        $this->result = null;
        $this->it->rewind();
        while ($this->it->hasNext()) {
            $this->match($this->it->next());
        }
        return $this->result;
    }

    private function match(Node $node): void
    {
        if ($this->result) {
            return;
        }
        if ($this->matches($node)) {
            $this->result = $node;
        }
    }

    abstract protected function matches(Node $node): bool;
}