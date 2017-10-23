<?php
namespace app\libraries\binarySearch;
use app\libraries\mergeSort\MergeSort;

class BinarySearch {
  private $myArray;

  public function __construct ($ar) {
    if (! is_a($ar, 'SplFixedArray')) {
      throw new \TypeError();
    }

    $this->myArray = $ar;
    $ms = new MergeSort($this->myArray);
    $ms->sort();
  }

  public function search ($target) {
    if ($this->myArray->count() > 0) {
      return $this->searchHelper($target, 0, $this->myArray->count());

    } else {
      return -1;

    }
  }

  private function searchHelper ($target, $left, $right) {
    if ($left <= $right) {
      $midPointIndex = floor(($right - $left) / 2) + $left;

      if ($this->myArray[$midPointIndex] == $target) {
        return $midPointIndex;

      } else if ($this->myArray[$midPointIndex] < $target) {
        return $this->searchHelper($target, $midPointIndex+1, $right);

      } else {
        return $this->searchHelper($target, $left, $midPointIndex-1);

      }
    } else {
      return -1;

    }
  }

  public function getArray () {
    return $this->myArray;
  }
}
?>
