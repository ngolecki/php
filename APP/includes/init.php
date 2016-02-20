<?php
include __SITE_PATH . 'application/controller_base.class.php';
include __SITE_PATH . 'application/registry.class.php';
include __SITE_PATH . 'application/router.class.php';
include __SITE_PATH . 'application/template.class.php';
include __SITE_PATH . 'application/request.class.php';

function __autoload($class_name) {
  $filename = strtolower($class_name) . '.class.php';
  $file = __SITE_PATH . 'model/' . $filename;

  if (file_exists($file) == false) {
    var_dump(__METHOD__.": trying to include for missing class: $file");
    return false;
  }

  include($file);
}

$registry = new registry;

// create it as singleton
$registry->db = db::getInstance();
