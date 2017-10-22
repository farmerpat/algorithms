<?php

use PHPUnit\Framework\TestCase;
use app\libraries\selectionSort\SelectionSort;

class SelectionSortTest extends TestCase {
  public function testSelectionSortForEmptyArray () {
    $ss = new SelectionSort(new SplFixedArray());
    $sorted = $ss->sort();

    $this->assertEquals(0, $sorted->count());
  }

  public function testSelectionSortForArrayOfOneElement () {
    $datum = 3;
    $ar = new SplFixedArray(1);
    $ar[0] = $datum;

    $ss = new SelectionSort($ar);
    $sorted = $ss->sort();

    $this->assertTrue(is_a($sorted, 'SplFixedArray'));
    $this->assertEquals(1, $sorted->count());
    $this->assertEquals($datum, $sorted[0]);

  }

  public function testSelectionSortForArrayOfTwoElements () {
    $d1 = 4;
    $d2 = 3;
    $ar = new SplFixedArray(2);
    $ar[0] = $d1;
    $ar[1] = $d2;

    $ss = new SelectionSort($ar);
    $sorted = $ss->sort();

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

  // i think the @dataProvider only works with regular arrays... :(
  public function testSelectionSortForArrayOfRandomNumberOfElements () {
    $ar = $this->generateRandomArray();
    //fwrite(STDERR, print_r($ar, true));

    $ss = new SelectionSort($ar);
    $ss->sort();

    $this->assertTrue($this->isSorted($ss->getArray()));
  }

  /**
   * @expectedException TypeError
   */
  public function testSelectionSortConstructorThrowsTypeErrorOnInvalidInput () {
    $ss = new SelectionSort([]);

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
