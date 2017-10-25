<?php
namespace app\libraries\heapSort;

class HeapSort {
  private $myArray;
  private $heapSize = 0;

  public function __construct ($ar) {
    if (! is_a($ar, 'SplFixedArray')) {
      throw new \TypeError();
    }

    $this->myArray = $ar;
    $this->heapSize = $this->myArray->count();
  }

  private function maxHeapify ($i) {
    $l = $this->getLeftIndex($i);
    $r = $this->getRightIndex($i);

    if (($l < $this->heapSize) && ($this->myArray[$l] > $this->myArray[$i])) {
      $largest = $l;

    } else {
      $largest = $i;

    }

    if (($r < $this->heapSize) && ($this->myArray[$r] > $this->myArray[$largest])) {
      $largest = $r;

    }

    if ($largest != $i) {
      $temp = $this->myArray[$i];
      $this->myArray[$i] = $this->myArray[$largest];
      $this->myArray[$largest] = $temp;
      $this->maxHeapify($largest);

    }
  }

  // these shouldn't be public, but testing...
  // this might indicate that a separate class is in order
  // e.g. HeapNodeUtil that only has static methods...
  public function getLeftIndex ($i) {
    return 2 * ($i + 1) - 1;
  }

  public function getRightIndex ($i) {
    return 2 * ($i + 1);
  }

  public function getArray () {
    return $this->myArray;
  }

  public function sort () {
    if ($this->myArray->count() > 1) {
      for ($i=floor($this->heapSize/2); $i > -1; $i--) {
        $this->maxHeapify($i);

      }

      for ($i=$this->heapSize-1; $i>0; $i--) {
        $max = $this->myArray[0];
        $this->myArray[0] = $this->myArray[$i];
        $this->myArray[$i] = $max;
        $this->heapSize--;
        $this->maxHeapify(0);

      }
    }

    return $this->myArray;
  }
}
?>
