<?php
/**
 * functions.php
 * 
 * (c)2013 mrdragonraaar.com
 */
if (basename($_SERVER['PHP_SELF']) == 'functions.php')
	die('You cannot load this page directly.');

require_once(__DIR__ . '/config.php');
require_once(__DIR__ . '/site_functions.php');
require_once(__DIR__ . '/theme_functions.php');
require_once(__DIR__ . '/plugin_functions.php');
require_once(__DIR__ . '/link_functions.php');
?>
