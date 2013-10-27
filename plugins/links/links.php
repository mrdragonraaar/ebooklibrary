<?php
/**
 * links.php
 * 
 * (c)2013 mrdragonraaar.com
 */
if (basename($_SERVER['PHP_SELF']) == 'links.php')
	die('You cannot load this page directly.');

/**
 * Display links plugin.
 */
function links()
{
	echo return_links();
}

/**
 * Get links plugin.
 * @return links plugin
 */
function return_links()
{
	$LINKS_TEMPLATE = 'template_links.php';

	ob_start();
	include($LINKS_TEMPLATE);
	return ob_get_clean();
}

// register icons css
register_plugin_css('links', 'css/css-social-icons.php');
// register css
register_plugin_css('links', 'css/links.css');

?>
