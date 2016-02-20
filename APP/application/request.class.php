<?php
class request {
  private $vars = NULL;

  public function __construct() {
  }

  public function load($key = null) {
    $this->vars[$key] = $_POST[$key];
  }

  public function __get($index)
  {
    return (isset($this->vars[$index]) ? $this->vars[$index] : null);
  }


}
