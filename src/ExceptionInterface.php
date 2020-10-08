<?php

namespace Morgriem\Calisthenics;

interface ExceptionInterface extends \Throwable
{
    public const
        BALANCED_TREE_INSERT_PLACE_NOT_FOUND = 1,
        NODE_CANT_HAVE_MORE_CHILDREN = 2
    ;
}