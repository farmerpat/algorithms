<?php

use PHPUnit\Framework\TestCase;
use app\libraries\binarySearch\BinarySearch;

class BinarySearchTest extends TestCase {
  public function testBinarySearchForEmptyArray () {
    $bs = new BinarySearch(new SplFixedArray());
    $searchResultIndex = $bs->search(2001);

    $this->assertEquals(-1, $searchResultIndex);
  }

  public function testBinarySearchForArrayOfOneElement () {
    $datum = 3;
    $ar = new SplFixedArray(1);
    $ar[0] = $datum;

    $bs = new BinarySearch($ar);
    $searchResultIndex = $bs->search($datum);

    $this->assertEquals(0, $searchResultIndex);
  }

  public function testBinarySearchForArrayOfTwoElements () {
    $d1 = 4;
    $d2 = 3;
    $ar = new SplFixedArray(2);
    $ar[0] = $d1;
    $ar[1] = $d2;

    $bs = new BinarySearch($ar);

    $searchResultIndex = $bs->search($d1);
    $this->assertEquals(1, $searchResultIndex);

    $searchResultIndex = $bs->search($d2);
    $this->assertEquals(0, $searchResultIndex);
  }

  public function testBinarySearchForArrayOfThreeElements () {
    $d1 = 4;
    $d2 = 3;
    $d3 = -1;

    $ar = new SplFixedArray(3);
    $ar[0] = $d1;
    $ar[1] = $d2;
    $ar[2] = $d3;

    $bs = new BinarySearch($ar);
    $searchResultIndex = $bs->search($d1);
    $this->assertEquals(2, $searchResultIndex);

    $searchResultIndex = $bs->search($d2);
    $this->assertEquals(1, $searchResultIndex);

    $searchResultIndex = $bs->search($d3);
    $this->assertEquals(0, $searchResultIndex);
  }

  private function generateRandomArray ($size) {
    $ar = new SplFixedArray($size);

    for ($i=0; $i<$ar->count(); $i++) {
      $ar[$i] = rand(-10000, 10001);

    }

    return $ar;
  }

  public function testBinarySearchForArrayOfRandomNumberOfElements () {
    $ar = $this->generateRandomArray(10000);
    $oldSize = $ar->count();

    $rIndex = rand(0, $oldSize);
    $rSearchTarget = rand(0, 10000);
    $ar[$rIndex] = $rSearchTarget;

    $bs = new BinarySearch($ar);
    $searchResultIndex = $bs->search($rSearchTarget);

    $this->assertNotEquals(-1, $searchResultIndex);
  }
}
?>
