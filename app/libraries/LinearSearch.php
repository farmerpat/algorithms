<?php
namespace app\libraries\linearSearch;

class LinearSearch {
  private $myArray;

  public function __construct ($ar) {
    if (! is_a($ar, 'SplFixedArray')) {
      throw new \TypeError();
    }

    $this->myArray = $ar;
  }

  public function search ($target) {
    $index = -1;

    for ($i=0; $i<$this->myArray->count(); $i++) {
      if ($this->myArray[$i] == $target) {
        $index = $i;
        break;

      }
    }

    return $index;
  }

  public function getArray () {
    return $this->myArray;
  }
}
?>
