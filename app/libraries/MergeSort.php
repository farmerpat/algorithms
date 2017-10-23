<?php
namespace app\libraries\mergeSort;

class MergeSort {
  private $myArray;
  private $n = 0;

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
      $this->sortHelper(0, $this->myArray->count()-1);
    }

    return $this->myArray;
  }

  private function sortHelper ($begin, $end) {
    //if (($begin < $end) && $this->n < 10)
    if ($begin < $end) {
      //fwrite(STDERR, "\n".'begin: ' . $begin . ' ' . 'end: ' . $end . "\n");
      $this->n++;
      //$midPoint = intdiv(($begin + $end), 2);
      $midPoint = floor(($begin + $end) / 2);
      //fwrite(STDERR, 'midpoint: ' . $midPoint . "\n");

      $this->sortHelper($begin, $midPoint);
      $this->sortHelper($midPoint+1, $end);

      $this->merge($begin, $midPoint, $end);
    }
  }

  private function merge ($begin, $midPoint, $end) {
    $leftSize = $midPoint - $begin + 1;
    $rightSize = $end - $midPoint;

    $leftChunk = new \SplFixedArray($leftSize);
    $rightChunk = new \SplFixedArray($rightSize);

    for ($i=$begin; $i<=$midPoint; $i++) {
      $leftChunk[$i-$begin] = $this->myArray[$i];
    }

    for ($i=$midPoint+1; $i<=$end; $i++) {
      $rightChunk[$i-($midPoint+1)] = $this->myArray[$i];
    }

    $leftIndex = 0;
    $rightIndex = 0;

    for ($myArrayIndex=$begin; $myArrayIndex<$end+1; $myArrayIndex++) {
      if ($leftIndex >= $leftSize) {
        $this->myArray[$myArrayIndex] = $rightChunk[$rightIndex];
        $rightIndex++;

      } else if ($rightIndex >= $rightSize) {
        $this->myArray[$myArrayIndex] = $leftChunk[$leftIndex];
        $leftIndex++;

      } else if ($leftChunk[$leftIndex] <= $rightChunk[$rightIndex]) {
        $this->myArray[$myArrayIndex] = $leftChunk[$leftIndex];
        $leftIndex++;

      } else {
        $this->myArray[$myArrayIndex] = $rightChunk[$rightIndex];
        $rightIndex++;

      }
    }
  }
}
?>
