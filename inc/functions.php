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
 * Display page title.
 */
function page_title()
{
	echo return_page_title();
}

/**
 * Get page title.
 */
function return_page_title()
{
	if (is_site_uri())
		return SITE_TITLE;

	$page_title = SITE_TITLE . ' | ';

	$mobipocket = get_mod_mobipocket();
	if (isset($mobipocket))
		$page_title .= $mobipocket->title();
	else
		$page_title .= basename(current_uri());

	return $page_title;
}

?>
