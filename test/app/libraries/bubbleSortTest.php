<?php

use PHPUnit\Framework\TestCase;
use app\libraries\bubbleSort\BubbleSort;

class BubbleSortTest extends TestCase {
  public function testBubbleSortForEmptyArray () {
    $bs = new BubbleSort(new SplFixedArray());
    $sorted = $bs->sort();

    $this->assertEquals(0, $sorted->count());
  }

  public function testBubbleSortForArrayOfOneElement () {
    $datum = 3;
    $ar = new SplFixedArray(1);
    $ar[0] = $datum;

    $bs = new BubbleSort($ar);
    $sorted = $bs->sort();

    $this->assertTrue(is_a($sorted, 'SplFixedArray'));
    $this->assertEquals(1, $sorted->count());
    $this->assertEquals($datum, $sorted[0]);

  }

  public function testBubbleSortForArrayOfTwoElements () {
    $d1 = 4;
    $d2 = 3;
    $ar = new SplFixedArray(2);
    $ar[0] = $d1;
    $ar[1] = $d2;

    $bs = new BubbleSort($ar);
    $sorted = $bs->sort();

    $this->assertTrue(is_a($sorted, 'SplFixedArray'));
    $this->assertEquals(2, $sorted->count());
    $this->assertEquals($d2, $sorted[0]);
    $this->assertEquals($d1, $sorted[1]);

  }

  private function generateRandomArray () {
    $count = rand(1, 10000);
    $ar = new SplFixedArray($count);

    for ($i=0; $i<$ar->count(); $i++) {
      $ar[$i] = rand(-10000, 10001);

    }

    return $ar;
  }

  public function testBubbleSortForArrayOfRandomNumberOfElements () {
    $ar = $this->generateRandomArray();

    $bs = new BubbleSort($ar);
    $bs->sort();

    $this->assertTrue($this->isSorted($bs->getArray()));
  }

  /**
   * @expectedException TypeError
   */
  public function testBubbleSortConstructorThrowsTypeErrorOnInvalidInput () {
    $bs = new BubbleSort([]);
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
