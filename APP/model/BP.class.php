<?php
class BP
{
  public $id;
  public $title;
  public $text;
  public $authorid;
  public $date;
  public $username;


  public function __construct($data = null) {
    echo __CLASS__." ".__METHOD__."<br />";
    print_r($data);
  }

  public function debug() {
    var_dump($this);
  }

}
