<?php

namespace Morgriem\Calisthenics\Tree\Searches;

use Morgriem\Calisthenics\Tree\Node;
use Morgriem\Calisthenics\Tree\Search;

final class BalancedPlaceForNewNode extends Search
{
    protected function matches(Node $node): bool
    {
        return $node->canHaveChildren();
    }
}