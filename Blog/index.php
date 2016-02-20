<?php
/**
 * single entry point to site
 * controllers called in router class
 * 
 * /
var_export($_REQUEST);

error_reporting(E_ALL);

$site_path = realpath(dirname(__FILE__))."/../APP/";
define('__SITE_PATH', $site_path);

include __SITE_PATH . 'includes/init.php';

// load the router
$registry->router = new router($registry);

// router controller
$registry->router->setPath(__SITE_PATH . 'controller/');

/*** load up the template ***/
$registry->template = new template($registry);

/*** load the request ***/
$registry->request = new request();

/*** load the controller ***/
$registry->router->loader();
