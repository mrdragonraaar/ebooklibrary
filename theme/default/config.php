<?php
/**
 * config.php
 * 
 * (c)2013 mrdragonraaar.com
 */
if (basename($_SERVER['PHP_SELF']) == 'config.php')
	die('You cannot load this page directly.');

define('THEME_IMG_URI', THEME_URI . 'images/');
define('THEME_LOGO', THEME_IMG_URI . 'ebooklibrarylogo.png');
define('THEME_KINDLE_IMG', THEME_IMG_URI . 'kindle.jpg');
?>
