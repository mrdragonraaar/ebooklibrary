<?php
/**
 * functions.php
 * 
 * (c)2013 mrdragonraaar.com
 */
require_once('config.php');

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
 * Get directory index search pattern.
 * @return search pattern
 */
function search_pattern()
{
	return array_key_exists('P', $_GET) ? $_GET['P'] : '';
}

/**
 * Display readme file.
 */
function readme()
{
	if (is_books_sub_uri())
	{
		$path = books_uri2path(current_uri());
		$readme_html = $path . README_NAME . '.html';
		$readme_txt = $path . README_NAME . '.txt';

		if (is_file($readme_html))
			include_once($readme_html);
		else if (is_file($readme_txt))
		{
			echo '<pre>';
			include_once($readme_txt);
			echo '</pre>';
		}
	}
}

?>
