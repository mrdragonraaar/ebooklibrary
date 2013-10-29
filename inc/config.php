<?php
/**
 * config.php
 * 
 * (c)2013 mrdragonraaar.com
 */
if (basename($_SERVER['PHP_SELF']) == 'config.php')
	die('You cannot load this page directly.');

// site title
define('SITE_TITLE', 'ebooklibrary');

// theme name
define('THEME_NAME', 'default');

// readme
define('README_NAME', 'ReadMe');

// icons
define('ICON_SITE', '/global/icons/fugue-icons/icons/e-book-reader-black.png');
define('ICON_SEARCH', '/global/icons/fugue-icons/icons/magnifier.png');
define('ICON_DIR_OPEN', '/global/icons/fugue-icons/icons/folder-horizontal-open.png');
define('ICON_DIR_CLOSED', '/global/icons/fugue-icons/icons/folder-horizontal.png');
define('ICON_MOBI', '/global/icons/fugue-icons/icons/document-mobi.png');



if (!defined('SITE_ROOT'))
	define('SITE_ROOT', dirname(__DIR__) . '/');
if (!defined('SITE_URI'))
	define('SITE_URI', substr(SITE_ROOT, strlen($_SERVER['DOCUMENT_ROOT'])));

if (!defined('INC_PATH'))
	define('INC_PATH', SITE_ROOT . 'inc/');

if (!defined('THEME_ROOT'))
	define('THEME_ROOT', SITE_ROOT . 'theme/' . THEME_NAME . '/');
if (!defined('THEME_URI'))
	define('THEME_URI', SITE_URI . 'theme/' . THEME_NAME . '/');

if (!defined('PLUGINS_ROOT'))
	define('PLUGINS_ROOT', SITE_ROOT . 'plugins/');
if (!defined('PLUGINS_URI'))
	define('PLUGINS_URI', SITE_URI . 'plugins/');

if (!defined('DATA_ROOT'))
	define('DATA_ROOT', SITE_ROOT . 'data/');

define('BOOKS_DIR', 'books');
if (!defined('BOOKS_URI'))
	define('BOOKS_URI', SITE_URI . trim(BOOKS_DIR, '/') . '/');
if (!defined('BOOKS_ROOT'))
	define('BOOKS_ROOT', books_root());

/**
 * Get the books root path.
 * @return books root
 */
function books_root()
{
	if (strpos($_SERVER['REQUEST_URI'], BOOKS_URI) !== 0)
		return null;

	$r = apache_lookup_uri($_SERVER['REQUEST_URI']);
	$uri = explode('/', trim($r->uri, '/'));
	$path = explode('/', trim($r->filename, '/'));

	$books_uri = array_diff($uri, $path);
	$books_uri = '/' . implode('/', $books_uri) . '/';
	$books_root = array_diff($path, $uri);
	$books_root = '/' . implode('/', $books_root) . '/';

	if ($books_uri !== BOOKS_URI)
		$books_root .= BOOKS_DIR . '/';

	return $books_root;
}

?>
