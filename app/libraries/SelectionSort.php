<?php
namespace app\libraries\insertionSort;

class InsertionSort {
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

      for ($i = 1; $i < $this->myArray->count(); $i++) {
        $moveableElt = $this->myArray[$i];

        $j = $i-1;

        while (($j > -1) && ($this->myArray[$j] > $moveableElt)) {
          $this->myArray[$j+1] = $this->myArray[$j];
          $j -= 1;

        }

        $this->myArray[$j+1] = $moveableElt;
      }
    }

    return $this->myArray;
  }
}
?>
