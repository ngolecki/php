<?php
abstract class ACD
{
  public $name = "Hugo";

  public function hello() {
    echo "Hello ".$this->name."<br />";
  }

  abstract public function sayhello();
}
 ?>
