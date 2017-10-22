<?php

use PHPUnit\Framework\TestCase;
use app\libraries\testObject\TestObject;

class testTestObject extends TestCase {
  public function setup () {
    $this->testObject = new TestObject();
  }

  public function testTestObjectOne () {
    $this->assertEquals(1,1);
  }
}
?>
