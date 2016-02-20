<?php
class ACDx extends ACD
{
  public function __construct() {
    $this->hello();
  }

  public function sayhello() {
    $this->name = "Fred";
    echo __METHOD__." says: hello ".$this->name."<br />";
  }
}
