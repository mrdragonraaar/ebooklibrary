<?php
/**
 * readme.php
 * 
 * (c)2013 mrdragonraaar.com
 */
if (basename($_SERVER['PHP_SELF']) == 'readme.php')
	die('You cannot load this page directly.');

// readme filename prefix 
set_plugin_config('README_NAME', 'ReadMe');

/**
 * Display readme plugin.
 */
function readme()
{
	echo return_readme();
}

/**
 * Get readme plugin.
 * @return readme plugin
 */
function return_readme()
{
	$README_TEMPLATE = 'template_readme.php';

	ob_start();
	include($README_TEMPLATE);
	return ob_get_clean();
}

/**
 * Get readme html filename.
 * @return readme html filename
 */
function get_readme_html_filename()
{
	return get_readme_filename('html');
}

/**
 * Get readme text filename.
 * @return readme text filename
 */
function get_readme_txt_filename()
{
	return get_readme_filename('txt');
}

/**
 * Get readme filename with specified extension.
 * @param $ext filename extension.
 * @return readme filename
 */
function get_readme_filename($ext)
{
	$path = books_uri2path(current_uri());

	return $path . readme_name() . '.' . $ext;
}

/**
 * Get readme filename prefix.
 * @return readme filename prefix 
 */
function readme_name()
{
	return get_plugin_config('README_NAME');
}

?>
