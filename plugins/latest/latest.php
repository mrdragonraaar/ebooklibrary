<?php
/**
 * latest.php
 * 
 * (c)2013 mrdragonraaar.com
 */
if (basename($_SERVER['PHP_SELF']) == 'latest.php')
	die('You cannot load this page directly.');

// latest books title
define('LATEST_TITLE', 'Latest additions');
// maximum number of books
define('LATEST_MAX_BOOKS', 21);
// maximum number of books per page
define('LATEST_MAX_SHOW', 7);

/**
 * Display latest books plugin.
 */
function latest()
{
	echo return_latest();
}

/**
 * Get latest books plugin.
 * @return latest books plugin
 */
function return_latest()
{
	$LATEST_TEMPLATE = 'template_latest.php';

	ob_start();
	include($LATEST_TEMPLATE);
	return ob_get_clean();
}

/**
 * Get array of latest books.
 * @param $max_books maximum number of books
 * @return array of latest books
 */
function latest_books($max_books = null)
{
	$books = books();
	uasort($books, 'ctime_cmp');
	if (isset($max_books) && is_int($max_books))
		$books = array_slice($books, 0, $max_books);

	return $books;
}

/**
 * Sort comparison by ctime descending.
 */
function ctime_cmp($a, $b)
{
	if ($a['ctime'] == $b['ctime'])
		return 0;

	return ($a['ctime'] < $b['ctime']) ? 1 : -1;
}

// register css
register_plugin_css('latest', 'css/latest.css');
// register javascript
register_plugin_js('latest', 'js/latest.js');

?>
