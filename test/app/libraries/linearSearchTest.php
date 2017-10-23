<?php

use PHPUnit\Framework\TestCase;
use app\libraries\linearSearch\LinearSearch;

class LinearSearchTest extends TestCase {
  public function testLinearSearchForEmptyArray () {
    $ls = new LinearSearch(new SplFixedArray());
    $searchResultIndex = $ls->search(2001);

    $this->assertEquals(-1, $searchResultIndex);
  }

  public function testLinearSearchForArrayOfOneElement () {
    $datum = 3;
    $ar = new SplFixedArray(1);
    $ar[0] = $datum;

    $ss = new LinearSearch($ar);
    $searchResultIndex = $ss->search($datum);

    $this->assertEquals(0, $searchResultIndex);
  }

  public function testLinearSearchForArrayOfTwoElements () {
    $d1 = 4;
    $d2 = 3;
    $ar = new SplFixedArray(2);
    $ar[0] = $d1;
    $ar[1] = $d2;

    $ss = new LinearSearch($ar);
    $searchResultIndex = $ss->search($d1);

    $this->assertEquals(0, $searchResultIndex);

    $searchResultIndex = $ss->search($d2);

    $this->assertEquals(1, $searchResultIndex);
  }

  private function generateRandomArray ($size) {
    $ar = new SplFixedArray($size);

    for ($i=0; $i<$ar->count(); $i++) {
      $ar[$i] = rand(-10000, 10001);

    }

    return $ar;
  }

  public function testLinearSearchForArrayOfRandomNumberOfElements () {
    $ar = $this->generateRandomArray(10000);
    $oldSize = $ar->count();

    $rIndex = rand(0, $oldSize);
    $rSearchTarget = rand(0, 10000);
    $ar[$rIndex] = $rSearchTarget;

    $ss = new LinearSearch($ar);
    $searchResultIndex = $ss->search($rSearchTarget);

    $this->assertEquals($rIndex, $searchResultIndex);
  }
}
?>
