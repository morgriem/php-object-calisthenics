<?php

namespace Morgriem\Calisthenics\Tests\Tree;

use Morgriem\Calisthenics\Tree\Types\Height;
use Morgriem\Calisthenics\Tree\Types\Label;
use Morgriem\Calisthenics\Tree\Tree;
use PHPUnit\Framework\TestCase;

class TreeTest extends TestCase
{
    public function testNewTreeHeightIsZero()
    {
        $tree = new Tree(Label::random());

        $height = $tree->height();

        $this->assertTrue(Height::zero()->equals($height));
    }

    /**
     * @param int $numberOfChildren
     * @param int $expectedHeight
     * @dataProvider treeHeightProvider
     */
    public function testHeightGrowsAsLogarithmOfChildrenNumber(int $numberOfChildren, int $expectedHeight)
    {
        $tree = new Tree(Label::random());

        for ($i = 0; $i < $numberOfChildren; ++$i) {
            $tree->addChild(Label::random());
        }

        $this->assertExpectedHeight($tree, $expectedHeight);
    }

    private function assertExpectedHeight(Tree $tree, int $expectedHeight): void
    {
        $this->assertTrue(Height::fromInt($expectedHeight)->equals($tree->height()), $expectedHeight);
    }

    public function treeHeightProvider()
    {
        return [
            [0, 0],
            [1, 1],
            [2, 1],
            [3, 2],
            [4, 2],
            [5, 2],
            [6, 2],
            [7, 3],
            [8, 3],
        ];
    }
}