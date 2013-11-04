<?php
/**
 * config.php
 * 
 * (c)2013 mrdragonraaar.com
 */
if (basename($_SERVER['PHP_SELF']) == 'config.php')
	die('You cannot load this page directly.');

// site title
$GLOBALS['_EBOOKLIBRARY']['SITE_TITLE'] = 'ebooklibrary';

// theme name
$GLOBALS['_EBOOKLIBRARY']['THEME_NAME'] = 'default';

// icons
$GLOBALS['_EBOOKLIBRARY']['ICONS']['SITE'] = '/global/icons/fugue-icons/icons/e-book-reader-black.png';
$GLOBALS['_EBOOKLIBRARY']['ICONS']['SEARCH'] = '/global/icons/fugue-icons/icons/magnifier.png';
$GLOBALS['_EBOOKLIBRARY']['ICONS']['DIR_OPEN'] = '/global/icons/fugue-icons/icons/folder-horizontal-open.png';
$GLOBALS['_EBOOKLIBRARY']['ICONS']['DIR_CLOSED'] = '/global/icons/fugue-icons/icons/folder-horizontal.png';
$GLOBALS['_EBOOKLIBRARY']['ICONS']['MOBI'] = '/global/icons/fugue-icons/icons/document-mobi.png';




/*************************************************************************************************/

$GLOBALS['_EBOOKLIBRARY']['SITE_ROOT'] = dirname(__DIR__) . '/';
$GLOBALS['_EBOOKLIBRARY']['SITE_URI'] = substr($GLOBALS['_EBOOKLIBRARY']['SITE_ROOT'], strlen($_SERVER['DOCUMENT_ROOT']));

$GLOBALS['_EBOOKLIBRARY']['INC_PATH'] = $GLOBALS['_EBOOKLIBRARY']['SITE_ROOT'] . 'inc/';

$GLOBALS['_EBOOKLIBRARY']['THEME_ROOT'] = $GLOBALS['_EBOOKLIBRARY']['SITE_ROOT'] . 'theme/' . $GLOBALS['_EBOOKLIBRARY']['THEME_NAME'] . '/';
$GLOBALS['_EBOOKLIBRARY']['THEME_URI'] = $GLOBALS['_EBOOKLIBRARY']['SITE_URI'] . 'theme/' . $GLOBALS['_EBOOKLIBRARY']['THEME_NAME'] . '/';

$GLOBALS['_EBOOKLIBRARY']['PLUGINS_ROOT'] = $GLOBALS['_EBOOKLIBRARY']['SITE_ROOT'] . 'plugins/';
$GLOBALS['_EBOOKLIBRARY']['PLUGINS_URI'] = $GLOBALS['_EBOOKLIBRARY']['SITE_URI'] . 'plugins/';

$GLOBALS['_EBOOKLIBRARY']['DATA_ROOT'] = $GLOBALS['_EBOOKLIBRARY']['SITE_ROOT'] . 'data/';

$GLOBALS['_EBOOKLIBRARY']['BOOKS_DIR'] = 'books';
$GLOBALS['_EBOOKLIBRARY']['BOOKS_URI'] = $GLOBALS['_EBOOKLIBRARY']['SITE_URI'] . trim($GLOBALS['_EBOOKLIBRARY']['BOOKS_DIR'], '/') . '/';
$GLOBALS['_EBOOKLIBRARY']['BOOKS_ROOT'] = _init_books_root();

/**
 * Get the books root path.
 * @return books root
 */
function _init_books_root()
{
	global $_EBOOKLIBRARY;

	if (strpos($_SERVER['REQUEST_URI'], $_EBOOKLIBRARY['BOOKS_URI']) !== 0)
		return null;

	$r = apache_lookup_uri($_SERVER['REQUEST_URI']);
	$uri = explode('/', trim($r->uri, '/'));
	$path = explode('/', trim($r->filename, '/'));

	$books_uri = array_diff($uri, $path);
	$books_uri = '/' . implode('/', $books_uri) . '/';
	$books_root = array_diff($path, $uri);
	$books_root = '/' . implode('/', $books_root) . '/';

	if ($books_uri !== $_EBOOKLIBRARY['BOOKS_URI'])
		$books_root .= $_EBOOKLIBRARY['BOOKS_DIR'] . '/';

	return $books_root;
}

/**
 * Get param from config.
 * @param $param param
 * @return param value
 */
function &get_config_param($param)
{
	global $_EBOOKLIBRARY;

	return $_EBOOKLIBRARY[$param];
}

?>
