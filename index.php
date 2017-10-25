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
use app\libraries\stack\Stack;

set_time_limit(120);

$stackSize = 30;
$s = new Stack($stackSize);

for ($i=0; $i<$stackSize; $i++) {
    $s->push(rand(0, 20000));
}

var_dump($s);
var_dump($s->peek());
var_dump($s->pop());
var_dump($s->peek());
$s->push(10);
$s->push(30);
var_dump($s);

echo '<br>';
echo '<br>';

echo '<br>' . $test->getTestData() . '<br>';

?>
