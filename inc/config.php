<?php
/**
 * config.php
 * 
 * (c)2013 mrdragonraaar.com
 */

// site title
define('SITE_TITLE', 'ebooklibrary');

// site logo filename
define('SITE_LOGO', 'ebooklibrarylogo.png');

// icons
define('ICON_SITE', '/global/icons/fugue-icons/icons/e-book-reader-black.png');
define('ICON_SEARCH', '/global/icons/fugue-icons/icons/magnifier.png');
define('ICON_DIR_OPEN', '/global/icons/fugue-icons/icons/folder-horizontal-open.png');
define('ICON_DIR_CLOSED', '/global/icons/fugue-icons/icons/folder-horizontal.png');
define('ICON_MOBI', '/global/icons/fugue-icons/icons/document-mobi.png');

// dropdown
define('DROPDOWN_LABEL_WIDTH', 24);

// latest
define('LATEST_TITLE', 'Latest additions');
define('LATEST_MAX_BOOKS', 21);
define('LATEST_MAX_SHOW', 7);

// readme
define('README_NAME', 'ReadMe');




if (!defined('SITE_ROOT'))
	define('SITE_ROOT', dirname(__DIR__) . '/');
if (!defined('SITE_URI'))
	define('SITE_URI', substr(SITE_ROOT, strlen($_SERVER['DOCUMENT_ROOT'])));
if (!defined('INC_PATH'))
	define('INC_PATH', SITE_ROOT . 'inc/');
if (!defined('LIB_PATH'))
	define('LIB_PATH', INC_PATH . 'lib/');
if (!defined('TEMPLATE_PATH'))
	define('TEMPLATE_PATH', SITE_ROOT . 'template/');
if (!defined('IMG_URI'))
	define('IMG_URI', SITE_URI . 'images/');
if (!defined('CSS_URI'))
	define('CSS_URI', SITE_URI . 'css/');

if (!defined('LOGO_URI'))
	define('LOGO_URI', IMG_URI . trim(SITE_LOGO, '/'));

define('BOOKS_DIR', 'books');
if (!defined('BOOKS_URI'))
	define('BOOKS_URI', SITE_URI . trim(BOOKS_DIR, '/') . '/');
if (!defined('BOOKS_ROOT'))
	define('BOOKS_ROOT', books_root());

/**
 * Get the root path to eBooks.
 */
function books_root()
{
	$req_uri = $_SERVER['REQUEST_URI'];
	if (strpos($req_uri, BOOKS_URI) !== 0)
		return null;

	$r = apache_lookup_uri($req_uri);
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
