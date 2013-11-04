<?php
/**
 * config.php
 * 
 * (c)2013 mrdragonraaar.com
 */
if (basename($_SERVER['PHP_SELF']) == 'config.php')
	die('You cannot load this page directly.');

set_theme_config('IMG_URI', theme_uri() . 'images/');
set_theme_config('LOGO', theme_img_uri() . 'ebooklibrarylogo.png');
set_theme_config('KINDLE_IMG', theme_img_uri() . 'kindle.jpg');

/**
 * Get theme image uri.
 * @return theme image uri
 */
function theme_img_uri()
{
	return get_theme_config('IMG_URI');
}

/**
 * Get uri of theme logo.
 * @return theme logo uri
 */
function theme_logo()
{
	return get_theme_config('LOGO');
}

/**
 * Get uri of theme kindle image.
 * @return theme kindle image uri
 */
function theme_kindle_img()
{
	return get_theme_config('KINDLE_IMG');
}

?>
