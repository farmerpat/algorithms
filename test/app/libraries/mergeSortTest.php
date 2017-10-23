<?php

use PHPUnit\Framework\TestCase;
use app\libraries\mergeSort\MergeSort;

class MergeSortTest extends TestCase {
  public function testMergeSortForEmptyArray () {
    $ss = new MergeSort(new SplFixedArray());
    $sorted = $ss->sort();

    $this->assertEquals(0, $sorted->count());
  }

  public function testMergeSortForArrayOfOneElement () {
    $datum = 3;
    $ar = new SplFixedArray(1);
    $ar[0] = $datum;

    $ss = new MergeSort($ar);
    $sorted = $ss->sort();

    $this->assertTrue(is_a($sorted, 'SplFixedArray'));
    $this->assertEquals(1, $sorted->count());
    $this->assertEquals($datum, $sorted[0]);

  }

  public function testMergeSortForArrayOfTwoElements () {
    $d1 = 4;
    $d2 = 3;
    $ar = new SplFixedArray(2);
    $ar[0] = $d1;
    $ar[1] = $d2;

    $ss = new MergeSort($ar);
    $sorted = $ss->sort();

    $this->assertTrue(is_a($sorted, 'SplFixedArray'));
    $this->assertEquals(2, $sorted->count());
    $this->assertEquals($d2, $sorted[0]);
    $this->assertEquals($d1, $sorted[1]);

  }

  public function testMergeSortForArrayOfThreeElements () {
    $ar = $this->generateRandomArray(3);

    $ss = new MergeSort($ar);
    $sorted = $ss->sort();

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
  public function testMergeSortForArrayOfRandomNumberOfElements () {
    $ar = $this->generateRandomArray(10000);
    $oldSize = $ar->count();

    $ss = new MergeSort($ar);
    $ss->sort();

    $this->assertTrue($this->isSorted($ss->getArray()));
    $this->assertEquals($oldSize, $ss->getArray()->count());
  }

  /**
   * @expectedException TypeError
   */
  public function testMergeSortConstructorThrowsTypeErrorOnInvalidInput () {
    $ss = new MergeSort([]);

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
