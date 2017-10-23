<?php
namespace app\libraries\selectionSort;

class SelectionSort {
  private $myArray;

  public function __construct ($ar) {
    if (! is_a($ar, 'SplFixedArray')) {
      throw new \TypeError();
    }

    $this->myArray = $ar;
  }

  public function getArray () {
    return $this->myArray;
  }

  public function sort () {
    if ($this->myArray->count() > 1) {
      for ($i = 0; $i < $this->myArray->count(); $i++) {
        $minIndex = $this->locateMinIndex($i);
        $temp = $this->myArray[$i];
        $this->myArray[$i] = $this->myArray[$minIndex];
        $this->myArray[$minIndex] = $temp;

      }
    }

    return $this->myArray;
  }

  // find the index of the min element
  // running from $startingIndex to the end
  // of myArray
  private function locateMinIndex ($startingIndex) {
    $minIndex = $startingIndex;
    $minValue = $this->myArray[$startingIndex];

    for ($i=$startingIndex+1; $i<$this->myArray->count(); $i++) {
      if ($this->myArray[$i] < $minValue) {
        $minValue = $this->myArray[$i];
        $minIndex = $i;

      }
    }

    return $minIndex;
  }
}
?>
