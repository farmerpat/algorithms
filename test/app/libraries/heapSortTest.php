<?php

use PHPUnit\Framework\TestCase;
use app\libraries\heapSort\HeapSort;

class HeapSortTest extends TestCase {
  public function testHeapSortForEmptyArray () {
    $hs = new HeapSort(new SplFixedArray());
    $sorted = $hs->sort();

    $this->assertEquals(0, $sorted->count());
  }

  public function testHeapSortGetLeftIndex () {
    $hs = new HeapSort(new SplFixedArray());

    $leftNodeIndex = $hs->getLeftIndex(0);
    $this->assertEquals(1, $leftNodeIndex);
    $leftNodeIndex = $hs->getLeftIndex(1);
    $this->assertEquals(3, $leftNodeIndex);
    $leftNodeIndex = $hs->getLeftIndex(2);
    $this->assertEquals(5, $leftNodeIndex);

  }

  public function testHeapSortGetRightIndex () {
    $hs = new HeapSort(new SplFixedArray());

    $rightNodeIndex = $hs->getRightIndex(0);
    $this->assertEquals(2, $rightNodeIndex);
    $rightNodeIndex = $hs->getRightIndex(1);
    $this->assertEquals(4, $rightNodeIndex);
    $rightNodeIndex = $hs->getRightIndex(2);
    $this->assertEquals(6, $rightNodeIndex);

  }

  public function testHeapSortForArrayOfOneElement () {
    $datum = 3;
    $ar = new SplFixedArray(1);
    $ar[0] = $datum;

    $hs = new HeapSort($ar);
    $sorted = $hs->sort();

    $this->assertTrue(is_a($sorted, 'SplFixedArray'));
    $this->assertEquals(1, $sorted->count());
    $this->assertEquals($datum, $sorted[0]);
  }

  public function testHeapSortForArrayOfTwoElements () {
    $d1 = 4;
    $d2 = 3;
    $ar = new SplFixedArray(2);
    $ar[0] = $d1;
    $ar[1] = $d2;

    $hs = new HeapSort($ar);
    $sorted = $hs->sort();

    $this->assertTrue(is_a($sorted, 'SplFixedArray'));
    $this->assertEquals(2, $sorted->count());
    $this->assertEquals($d2, $sorted[0]);
    $this->assertEquals($d1, $sorted[1]);
  }

  public function testHeapSortForArrayOfThreeElements () {
    $ar = $this->generateRandomArray(3);

    $hs = new HeapSort($ar);
    $sorted = $hs->sort();

    $this->assertTrue(is_a($sorted, 'SplFixedArray'));
    $this->assertTrue($this->isSorted($sorted));
  }

  private function generateRandomArray ($size) {
    $ar = new SplFixedArray($size);

    for ($i=0; $i<$ar->count(); $i++) {
      $ar[$i] = rand(-10000, 10001);

    }

    return $ar;
  }

  // i think the @dataProvider only works with regular arrays... :(
  public function testHeapSortForArrayOfRandomNumberOfElements () {
    $ar = $this->generateRandomArray(10000);
    $oldSize = $ar->count();

    $hs = new HeapSort($ar);
    $hs->sort();

    $this->assertTrue($this->isSorted($hs->getArray()));
    $this->assertEquals($oldSize, $hs->getArray()->count());
  }

  /**
   * @expectedException TypeError
   */
  public function testHeapSortConstructorThrowsTypeErrorOnInvalidInput () {
    $hs = new HeapSort([]);
  }

  private function isSorted ($ar) {
    $pred = true;
    // iterate through all the elements, and make sure that
    // they are in non-decreasing order
    if ($ar->count() > 1) {
      $last_val = $ar[0];

      for ($i = 1; $i < $ar->count(); $i++) {
        $new_val = $ar[$i];

        if ($new_val < $last_val) {
          $pred = false;
          break;
        }

        $last_val = $new_val;
      }
    }

    return $pred;
  }
}
?>
