<?php
require __DIR__ . '/vendor/autoload.php';

use app\libraries\testObject\TestObject;
use app\libraries\mergeSort\MergeSort;
use app\libraries\selectionSort\SelectionSort;
use app\libraries\insertionSort\InsertionSort;

set_time_limit(120);

$arraySize = 30000;
$test = new TestObject();
$ar = new SplFixedArray($arraySize);

for ($i=0; $i<$ar->count(); $i++) {
  $ar[$i] = rand(0, 1000000);
}

$mergeSortTimeStart = microtime(true);
$ms = new MergeSort($ar);
echo '<br>';
$ms->sort();
$mergeSortTimeEnd = microtime(true);
echo 'merge sort time for ' . $arraySize . ' random non-negative integers: ';
echo ($mergeSortTimeEnd - $mergeSortTimeStart) . ' seconds';
echo '<br>';
echo '<br>';

$ar = new SplFixedArray($arraySize);

for ($i=0; $i<$ar->count(); $i++) {
  $ar[$i] = rand(0, 1000000);
}

$selectionSortTimeStart = microtime(true);
$ss = new SelectionSort($ar);
$ss->sort();
$selectionSortTimeEnd = microtime(true);
echo 'selection sort time for ' . $arraySize . ' random non-negative integers: ';
echo ($selectionSortTimeEnd - $selectionSortTimeStart) . ' seconds';
echo '<br>';
echo '<br>';

$ar = new SplFixedArray($arraySize);

for ($i=0; $i<$ar->count(); $i++) {
  $ar[$i] = rand(0, 1000000);
}

$insertionSortTimeStart = microtime(true);
$is = new InsertionSort($ar);
$is->sort();
$insertionSortTimeEnd = microtime(true);
echo 'insertion sort time for ' . $arraySize . ' random non-negative integers: ';
echo ($insertionSortTimeEnd - $insertionSortTimeStart) . ' seconds';
echo '<br>';
echo '<br>';

echo '<br>' . $test->getTestData() . '<br>';

?>
