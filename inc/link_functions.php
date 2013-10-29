<?php
/**
 * link_functions.php
 * 
 * (c)2013 mrdragonraaar.com
 */
if (basename($_SERVER['PHP_SELF']) == 'link_functions.php')
	die('You cannot load this page directly.');

require_once(__DIR__ . '/lib/Links.php');

$LINKS = new Links();

// load links
load_links();

/**
 * Load links.
 */
function load_links()
{
	global $LINKS;

	$LINKS->load();
}

/**
 * Load links.
 */
function save_links()
{
	global $LINKS;

	return $LINKS->save();
}

/**
 * Get an array of links.
 * @return array of links
 */
function get_links()
{
	global $LINKS;

	return $LINKS->links();
}

/**
 * Get a link by id.
 * @param $id id
 * @return link
 */
function get_link($id)
{
	global $LINKS;

	return $LINKS->link($id);
}

/**
 * Get a link by title.
 * @param $title title
 * @return link
 */
function get_link_by_title($title)
{
	global $LINKS;

	return $LINKS->link_by_title($title);
}

/**
 * Add a link.
 * @param $link link
 * @return link
 */
function add_link(Link $link)
{
	global $LINKS;

	return $LINKS->add_link($link);
}

/**
 * Set a link.
 * @param $id id
 * @param $link link
 * @return link
 */
function set_link($id, Link $link)
{
	global $LINKS;

	return $LINKS->set_link($id, $link);
}

/**
 * Remove a link.
 * @param $id id
 */
function remove_link($id)
{
	global $LINKS;

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
