<?php
require __DIR__ . '/vendor/autoload.php';

use app\libraries\testObject\TestObject;
use app\libraries\mergeSort\MergeSort;
use app\libraries\selectionSort\SelectionSort;
use app\libraries\insertionSort\InsertionSort;
use app\libraries\linearSearch\LinearSearch;
use app\libraries\binarySearch\BinarySearch;
use app\libraries\bubbleSort\BubbleSort;
use app\libraries\heapSort\HeapSort;

set_time_limit(120);

$arraySize = 10000;
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

$heapSortTimeStart = microtime(true);
$hs = new HeapSort($ar);
echo '<br>';
$hs->sort();
$heapSortTimeEnd = microtime(true);
echo 'heap sort time for ' . $arraySize . ' random non-negative integers: ';
echo ($heapSortTimeEnd - $heapSortTimeStart) . ' seconds';
echo '<br>';
echo '<br>';

echo '<br>' . $test->getTestData() . '<br>';

?>
