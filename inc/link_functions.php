<?php
/**
 * link_functions.php
 * 
 * (c)2013 mrdragonraaar.com
 */
if (basename($_SERVER['PHP_SELF']) == 'link_functions.php')
	die('You cannot load this page directly.');

require_once(__DIR__ . '/lib/Links.php');

// links
$GLOBALS['_EBOOKLIBRARY']['LINKS'] = new Links();

// load links
load_links();

/**
 * Load links.
 */
function load_links()
{
	$LINKS = &get_config_param('LINKS');

	if (isset($LINKS))
		$LINKS->load();
}

/**
 * Save links.
 */
function save_links()
{
	$LINKS = &get_config_param('LINKS');

	if (isset($LINKS))
		return $LINKS->save();

	return false;
}

/**
 * Get an array of links.
 * @return array of links
 */
function get_links()
{
	$LINKS = &get_config_param('LINKS');

	if (isset($LINKS))
		return $LINKS->links();

	return array();
}

/**
 * Get a link by id.
 * @param $id id
 * @return link
 */
function get_link($id)
{
	$LINKS = &get_config_param('LINKS');

	if (isset($LINKS))
		return $LINKS->link($id);

	return null;
}

/**
 * Get a link by title.
 * @param $title title
 * @return link
 */
function get_link_by_title($title)
{
	$LINKS = &get_config_param('LINKS');

	if (isset($LINKS))
		return $LINKS->link_by_title($title);

	return null;
}

/**
 * Add a link.
 * @param $link link
 * @return link
 */
function add_link(Link $link)
{
	$LINKS = &get_config_param('LINKS');

	if (isset($LINKS))
		return $LINKS->add_link($link);

	return null;
}

/**
 * Set a link.
 * @param $id id
 * @param $link link
 * @return link
 */
function set_link($id, Link $link)
{
	$LINKS = &get_config_param('LINKS');

	if (isset($LINKS))
		return $LINKS->set_link($id, $link);

	return null;
}

/**
 * Remove a link.
 * @param $id id
 */
function remove_link($id)
{
	$LINKS = &get_config_param('LINKS');

	if (isset($LINKS))
		$LINKS->remove_link($id);
}

/**
 * Get an url for display.
 * @param $url url
 * @return display url
 */
function url_display($url)
{
	$url_ar = parse_url($url);

	$url = $url_ar['host'];
	if (isset($url_ar['path'])) $url .= $url_ar['path'];

	return $url;
}

?>
