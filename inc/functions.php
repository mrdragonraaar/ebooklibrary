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

/**
 * Display readme file.
 */
function readme()
{
	if (is_books_sub_uri())
	{
		$path = books_uri2path(current_uri());
		$readme_html = $path . README_NAME . '.html';
		$readme_txt = $path . README_NAME . '.txt';

		if (is_file($readme_html))
			include_once($readme_html);
		else if (is_file($readme_txt))
		{
			echo '<pre>';
			include_once($readme_txt);
			echo '</pre>';
		}
	}
}

?>
