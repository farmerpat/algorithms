<?php
require __DIR__ . '/vendor/autoload.php';

use app\libraries\testObject\TestObject;
use app\libraries\mergeSort\MergeSort;
use app\libraries\selectionSort\SelectionSort;
use app\libraries\insertionSort\InsertionSort;
use app\libraries\linearSearch\LinearSearch;
use app\libraries\binarySearch\BinarySearch;

set_time_limit(120);

$arraySize = 2000000;
$test = new TestObject();

/*
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

 */

$ar = new SplFixedArray($arraySize);

for ($i=0; $i<$ar->count(); $i++) {
  $ar[$i] = rand(0, 1000000);
}

$linearSearchTimeStart = microtime(true);
$ls = new LinearSearch($ar);
$searchTarget = rand(0, 1000000);
$searchResultIndex = $ls->search($searchTarget);
$linearSearchTimeEnd = microtime(true);

echo 'linear search time for ' . $arraySize . ' random non-negative integers ';
echo 'for a random non-negative integer, ' . $searchTarget . ': ';
echo ($linearSearchTimeEnd - $linearSearchTimeStart) . ' seconds';
echo '<br>';
echo '<br>';

$ar = new SplFixedArray($arraySize);

for ($i=0; $i<$ar->count(); $i++) {
  $ar[$i] = rand(0, 1000000);
}

// start timing after constructor to avoid counting the initial sort
$bs = new BinarySearch($ar);
$binarySearchTimeStart = microtime(true);
$searchTarget = rand(0, 1000000);
$searchResultIndex = $ls->search($searchTarget);
$binarySearchTimeEnd = microtime(true);

echo 'binary search time for ' . $arraySize . ' random non-negative integers ';
echo 'for a random non-negative integer, ' . $searchTarget . ': ';
echo ($binarySearchTimeEnd - $binarySearchTimeStart) . ' seconds';
echo '<br>';
echo '<br>';

echo '<br>' . $test->getTestData() . '<br>';

?>
