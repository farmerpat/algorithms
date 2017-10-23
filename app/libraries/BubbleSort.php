<?php
namespace app\libraries\bubbleSort;

class BubbleSort {
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
      $swapPerformed = true;

      for ($i=0; $i<$this->myArray->count()-1 && $swapPerformed; $i++) {
        $swapPerformed = false;

        for ($j=$this->myArray->count()-1; $j>$i; $j--) {
          if ($this->myArray[$j] < $this->myArray[$j-1]) {
            $swapPerformed = true;
            $temp = $this->myArray[$j-1];
            $this->myArray[$j-1] = $this->myArray[$j];
            $this->myArray[$j] = $temp;

          }
        }
      }
    }

    return $this->myArray;
  }
}
?>
