<?php

/**
 *  Registry Class
 *  @access private
 */
class registry {
  /**
   *  the vars array
   *  @access private
   */
  private $vars = array();

  /**
   *  @set undefined vars
   *  @param string $index
   *  @param mixed $value
   *  @return void
   */
  function __set($index, $value)
  {
    $this->vars[$index] = $value;
  }

  /**
   *  @get variables
   *  @param string $index
   *  @return mixed
   */
   function __get($index)
   {
     return (isset($this->vars[$index]) ? $this->vars[$index] : null);
   }
}
