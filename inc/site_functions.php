<?php
/**
 * site_functions.php
 * 
 * (c)2013 mrdragonraaar.com
 */
if (basename($_SERVER['PHP_SELF']) == 'site_functions.php')
	die('You cannot load this page directly.');

require_once(__DIR__ . '/config.php');
require_once('mobipocket/mobipocket.php');

/**
 * Check whether browser is kindle browser.
 * @return true if kindle browser
 */
function is_kindle()
{
	return strpos($_SERVER['HTTP_USER_AGENT'], 'Kindle') !== false;
}

/**
 * Get the current uri.
 * @return current uri
 */
function current_uri()
{
	return rawurldecode(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
}

/**
 * Check whether current uri is site uri.
 * @return true if current uri is site uri
 */
function is_site_uri()
{
	return current_uri() === SITE_URI;
}

/**
 * Check whether current uri is books uri.
 * @return true if current uri is books uri
 */
function is_books_uri()
{
	return current_uri() === BOOKS_URI;
}

/**
 * Get remaining path component under books uri
 * of given uri.
 * @param $uri uri
 * @return books sub-uri
 */
function books_sub_uri($uri)
{
	$uri = rawurldecode($uri);

	if (substr($uri, 0, strlen(BOOKS_URI)) === BOOKS_URI)
		return substr($uri, strlen(BOOKS_URI));

	return '';
}

/**
 * Check whether current uri is sub-uri of books uri.
 * @param $uri uri
 * @return true if books sub-uri
 */
function is_books_sub_uri()
{
	return books_sub_uri(current_uri()) ? true : false;
}

/**
 * Get remaining path component under books path
 * of given path.
 * @param $path path
 * @return books sub-path
 */
function books_sub_path($path)
{
	if (substr($path, 0, strlen(BOOKS_ROOT)) === BOOKS_ROOT)
		return substr($path, strlen(BOOKS_ROOT));

	return '';
}

/**
 * Convert books uri to books path.
 * @param $uri books uri
 * @return books path
 */
function books_uri2path($uri)
{
	return BOOKS_ROOT . books_sub_uri($uri);
}

/**
 * Convert books path to books uri.
 * @param $path books path
 * @return books uri
 */
function books_path2uri($path)
{
	return BOOKS_URI . books_sub_path($path);
}

/**
 * Check whether mod_mobipocket exists.
 * @return true if mod_mobipocket exists
 */
function is_mod_mobipocket()
{
	return get_mod_mobipocket() ? true : false;
}

/**
 * Get mobipocket object from mod_mobipocket.
 * @return MobiPocket
 */
function get_mod_mobipocket()
{
	global $mod_mobipocket;
	if (isset($mod_mobipocket))
		return $mod_mobipocket->mobipocket;

	return null;
}

/**
 * Display page title.
 */
function page_title()
{
	echo return_page_title();
}

/**
 * Get page title.
 * @return page title.
 */
function return_page_title()
{
	if (is_site_uri())
		return SITE_TITLE;

	return SITE_TITLE . ' | ' . return_page_sub_title();
}

/**
 * Display page sub-title.
 */
function page_sub_title()
{
	echo return_page_sub_title();
}

/**
 * Get page sub-title.
 * @return page sub-title.
 */
function return_page_sub_title()
{
	$mobipocket = get_mod_mobipocket();
	if (isset($mobipocket))
		return $mobipocket->title();

	if (defined('PAGE_TITLE') && PAGE_TITLE)
		return PAGE_TITLE;

	return basename(current_uri());
}

/**
 * Get directory index search pattern.
 * @return search pattern
 */
function search_pattern()
{
	return array_key_exists('P', $_GET) ? $_GET['P'] : '';
}

/**
 * Get array of books in specified directory.
 * @param $dir directory
 * @param $books array of books
 * @return new array of books
 */
function books($dir = BOOKS_ROOT, $books = array())
{
	if (!isset($dir) || !is_dir($dir))
		return $books;

	if ($dh = opendir($dir))
	{
		while (false !== ($entry = readdir($dh)))
		{
			if (($entry == '.') || ($entry == '..'))
				continue;

			$file = rtrim($dir, '/') . '/' . $entry;

			if (is_dir($file))
				$books = books($file, $books);
			else
			{
				if (pathinfo($file, PATHINFO_EXTENSION) == 'mobi')
					$books[$file] = stat($file);
			}
		}

		closedir($dh);
	}

	return $books;
}

?>
