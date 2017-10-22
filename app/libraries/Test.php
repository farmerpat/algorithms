<?php
namespace app\libraries\testObject;

class TestObject {
  public function __construct () {
    $this->test_data = "test_data is real";
  }

  public function getTestData () {
    return $this->test_data;

  }
}

?>
