<?php
/**
 * template_functions.php
 * 
 * (c)2013 mrdragonraaar.com
 */
require_once('lib/Template.php');
require_once('lib/Dropdown.php');
require_once('lib/Latest.php');

/**
 * Display dropdown menu template.
 * @param $mobipocket mobipocket ebook
 */
function template_dropdown($mobipocket)
{
	$dropdown = new Dropdown();
	$dropdown->template($mobipocket);
}

/**
 * Get dropdown menu template.
 * @param $mobipocket mobipocket ebook
 * @return template html
 */
function return_template_dropdown($mobipocket)
{
	$dropdown = new Dropdown();
	return $dropdown->return_template($mobipocket);
}

/**
 * Display links template.
 */
function template_links()
{
	$links = new Template('links');
	$links->template();
}

/**
 * Get links template.
 * @return template html
 */
function return_template_links()
{
	$links = new Template('links');
	return $links->return_template();
}

/**
 * Display latest additions template.
 */
function template_latest()
{
	$latest = new Latest();
	$latest->template();
}

/**
 * Get latest additions template.
 * @return template html
 */
function return_template_latest()
{
	$latest = new Latest();
	return $latest->return_template();
}

/**
 * Display alphabet links template.
 */
function template_alphabet()
{
	$alphabet = new Template('alphabet');
	$alphabet->template();
}

/**
 * Get alphabet links template.
 * @return template html
 */
function return_template_alphabet()
{
	$alphabet = new Template('alphabet');
	return $alphabet->return_template();
}

?>
