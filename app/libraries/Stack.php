<?php

namespace app\libraries\stack;

class Stack {
    private $maxStackSize;
    private $theStack;
    private $stackPointer = -1;

    // implementing swap and rot would be fun
    public function __construct ($size=30) {
        $this->maxStackSize = $size;
        $this->theStack = new \SplFixedArray($this->maxStackSize);
    }

    public function push ($elt) {
        if ($this->stackPointer == ($this->maxStackSize-1)) {
            $this->theStack->setSize($this->maxStackSize+10);
            $this->maxStackSize += 10;
        }

        $this->stackPointer++;
        $this->theStack[$this->stackPointer] = $elt;
    }

    public function pop () {
        if ($this->stackPointer == -1) {
            return null;

        } else {
            $elt = $this->theStack[$this->stackPointer];
            $this->stackPointer--;
            return $elt;

        }
    }

    public function peek () {
        if ($this->stackPointer == -1) {
            return null;
        } else {
            return $this->theStack[$this->stackPointer];
        }
    }
}
