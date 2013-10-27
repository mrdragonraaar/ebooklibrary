<?php
/**
 * dropdown.php
 * 
 * (c)2013 mrdragonraaar.com
 */
if (basename($_SERVER['PHP_SELF']) == 'dropdown.php')
	die('You cannot load this page directly.');

// width of dropdown kabel
define('DROPDOWN_LABEL_WIDTH', 24);

/**
 * Display dropdown menu plugin.
 * @param $mobipocket mobipocket book
 */
function dropdown($mobipocket)
{
	echo return_dropdown($mobipocket);
}

/**
 * Get dropdown menu plugin.
 * @param $mobipocket mobipocket book
 * @return dropdown menu plugin
 */
function return_dropdown($mobipocket)
{
	$DROPDOWN_TEMPLATE = 'template_dropdown.php';

	ob_start();
	include($DROPDOWN_TEMPLATE);
	return ob_get_clean();
}

/**
 * Get shortened label text for dropdown menu.
 * @param $text text to shorten
 * @return shortened label text
 */
function dropdown_label($text)
{
	return strlen($text) > DROPDOWN_LABEL_WIDTH ?
	   substr($text, 0, DROPDOWN_LABEL_WIDTH) . '...' :
	   $text;
}

// register css
register_plugin_css('dropdown', 'css/dropdown.css');
// register javascript
register_plugin_js('dropdown', 'js/dropdown.js');

?>
