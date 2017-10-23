<?php
require __DIR__ . '/vendor/autoload.php';

use app\libraries\testObject\TestObject;
use app\libraries\mergeSort\MergeSort;
use app\libraries\selectionSort\SelectionSort;
use app\libraries\insertionSort\InsertionSort;
use app\libraries\linearSearch\LinearSearch;
use app\libraries\binarySearch\BinarySearch;
use app\libraries\bubbleSort\BubbleSort;

set_time_limit(120);

$arraySize = 20000;
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

$bubbleSortTimeStart = microtime(true);
$bs = new BubbleSort($ar);
echo '<br>';
$bs->sort();
$bubbleSortTimeEnd = microtime(true);
echo 'bubble sort time for ' . $arraySize . ' random non-negative integers: ';
echo ($bubbleSortTimeEnd - $bubbleSortTimeStart) . ' seconds';
echo '<br>';
echo '<br>';



echo '<br>' . $test->getTestData() . '<br>';

?>
