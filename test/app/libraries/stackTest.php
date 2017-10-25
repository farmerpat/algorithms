<?php

use PHPUnit\Framework\TestCase;
use app\libraries\stack\Stack;

class StackTest extends TestCase {
    public function testStackPopEmptyStack () {
        $s = new Stack();
        $datum = $s->pop();

        $this->assertEquals(null, $datum);
    }

    public function testStackForOneElementPeek () {
        $datum = 3;

        $s = new Stack();
        $s->push($datum);

        $this->assertEquals(3, $s->peek());
    }

    public function testStackForOneElementPop () {
        $datum = 3;

        $s = new Stack();
        $s->push($datum);
        $popped = $s->pop();

        $this->assertEquals(3, $popped);
    }

    public function testStackForTwoElementPeek () {
        $d1 = 4;
        $d2 = 3;

        $s = new Stack();
        $s->push($d1);
        $s->push($d2);

        $this->assertEquals(3, $s->peek());
        $s->pop();
        $this->assertEquals(4, $s->peek());
    }

    public function testStackForTwoElementPop () {
        $d1 = 4;
        $d2 = 3;

        $s = new Stack();
        $s->push($d1);
        $s->push($d2);

        $popped = $s->pop();
        $this->assertEquals(3, $popped);

        $popped = $s->pop();
        $this->assertEquals(4, $popped);
    }

    public function testStackForThreeElementPeek () {
        $d1 = 4;
        $d2 = 3;
        $d3 = -1;

        $s = new Stack();
        $s->push($d1);
        $s->push($d2);
        $s->push($d3);
        // -1, 3, 4

        $this->assertEquals(-1, $s->peek());

        $s->pop();
        $this->assertEquals(3, $s->peek());

        $s->pop();
        $this->assertEquals(4, $s->peek());
    }

    public function testStackForThreeElementPop () {
        $d1 = 4;
        $d2 = 3;
        $d3 = -1;

        $s = new Stack();
        $s->push($d1);
        $s->push($d2);
        $s->push($d3);
        // -1, 3, 4

        $popped = $s->pop();
        $this->assertEquals(-1, $popped);

        $popped = $s->pop();
        $this->assertEquals(3, $popped);

        $popped = $s->pop();
        $this->assertEquals(4, $popped);
    }

    public function testStackForMaxPushOverflow () {
        $maxStackSize = 20;
        $s = new Stack($maxStackSize);

        for ($i=0; $i<$maxStackSize; $i++) {
            $s->push(rand(0,2001));
        }

        // this should cause the stack to resize itself and not fail
        $elt = rand(0,2001);
        $s->push($elt);

        $this->assertEquals($elt, $s->peek());
    }
}
?>
