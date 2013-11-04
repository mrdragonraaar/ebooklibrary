<?php
/**
 * dropdown.php
 * 
 * (c)2013 mrdragonraaar.com
 */
if (basename($_SERVER['PHP_SELF']) == 'dropdown.php')
	die('You cannot load this page directly.');

// width of dropdown label
set_plugin_config('DROPDOWN_LABEL_WIDTH', 24);

/**
 * Display dropdown menu plugin.
 */
function dropdown()
{
	echo return_dropdown();
}

/**
 * Get dropdown menu plugin.
 * @return dropdown menu plugin
 */
function return_dropdown()
{
	$DROPDOWN_TEMPLATE = 'template_dropdown.php';

	ob_start();
	include($DROPDOWN_TEMPLATE);
	return ob_get_clean();
}

/**
 * Get shortened label text for base menu.
 * @return shortened label text
 */
function dropdown_basemenu_label()
{
	return dropdown_label(return_page_sub_title());
}

/**
 * Get shortened label text for dropdown menu.
 * @param $text text to shorten
 * @return shortened label text
 */
function dropdown_label($text)
{
	return strlen($text) > dropdown_label_width() ?
	   substr($text, 0, dropdown_label_width()) . '...' :
	   $text;
}

/**
 * Get width of dropdown menu label text.
 * @return label text width
 */
function dropdown_label_width()
{
	return get_plugin_config('DROPDOWN_LABEL_WIDTH');
}

/**
 * Get icon for base menu.
 * @return base menu icon
 */
function dropdown_basemenu_icon()
{
	if (is_mod_mobipocket())
		return icon_mobi();

	if (icon_page())
		return icon_page();

	return icon_dir_open();
}

// register css
register_plugin_css('dropdown', 'css/dropdown.css');
// register javascript
register_plugin_js('dropdown', 'js/dropdown.js');

?>
