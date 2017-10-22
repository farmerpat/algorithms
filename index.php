<?php
require __DIR__ . '/vendor/autoload.php';

use app\libraries\testObject\TestObject;
use app\libraries\insertionSort\InsertionSort;

$test = new TestObject();
$ar = new SplFixedArray(5);

for ($i=0; $i<$ar->count(); $i++) {
  $ar[$i] = rand(0, 2001);
}

var_dump($ar);

$ss = new InsertionSort($ar);
echo '<br>';
$ss = $ss->sort();
echo '<br>';
echo '<br>';
var_dump($ss);
echo '<br>';
echo '<br>';

echo '<br>' . $test->getTestData() . '<br>';

?>
