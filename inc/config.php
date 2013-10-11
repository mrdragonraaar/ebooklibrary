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

// path to eBooks.
define('BOOKS_PATH', '/data/media/eBooks/');

// directory name for eBooks url.
define('BOOKS_DIR', 'books');

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




if (!defined('SITE_PATH'))
	define('SITE_PATH', dirname(__DIR__) . '/');
if (!defined('SITE_URL'))
	define('SITE_URL', substr(SITE_PATH, strlen($_SERVER['DOCUMENT_ROOT'])));
if (!defined('INC_PATH'))
	define('INC_PATH', SITE_PATH . 'inc/');
if (!defined('LIB_PATH'))
	define('LIB_PATH', INC_PATH . 'lib/');
if (!defined('TEMPLATE_PATH'))
	define('TEMPLATE_PATH', SITE_PATH . 'template/');
if (!defined('IMG_URL'))
	define('IMG_URL', SITE_URL . 'images/');
if (!defined('CSS_URL'))
	define('CSS_URL', SITE_URL . 'css/');

if (!defined('LOGO_URL'))
	define('LOGO_URL', IMG_URL . trim(SITE_LOGO, '/'));
if (!defined('BOOKS_URL'))
	define('BOOKS_URL', SITE_URL . trim(BOOKS_DIR, '/') . '/');

?>
