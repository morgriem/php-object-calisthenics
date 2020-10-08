<?php

namespace Morgriem\Calisthenics\Tests\Queue;

use Morgriem\Calisthenics\Queue\Queue;
use PHPUnit\Framework\TestCase;

class QueueTest extends TestCase
{
    public function testNewQueueIsEmpty()
    {
        $queue = new Queue();
        $this->assertTrue($queue->isEmpty());
    }

    public function testPushedElementsArePoppedInFIFOOrder()
    {
        $queue = Queue::createEmpty();
        $elements = ['Some string', 23, new \stdClass(), null, 666];

        foreach ($elements as $element) {
            $queue->push($element);
        }

        for ($i = 0; $i < count($elements); ++$i) {
            $poppedElement = $queue->pop();
            $this->assertEquals($elements[$i], $poppedElement);
        }
    }
}