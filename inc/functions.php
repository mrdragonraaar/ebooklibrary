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
 * Get the current url.
 * @return current url
 */
function current_url()
{
	return rawurldecode(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
}

/**
 * Check whether current url is site url.
 * @return true if current url is site url
 */
function is_site_url()
{
	return current_url() === SITE_URL;
}

/**
 * Check whether current url is books url.
 * @return true if current url is books url
 */
function is_books_url()
{
	return current_url() === BOOKS_URL;
}

/**
 * Get remaining path component under books url
 * of given url.
 * @param $url url
 * @return books sub-url
 */
function books_sub_url($url)
{
	$url = rawurldecode($url);

	if (substr($url, 0, strlen(BOOKS_URL)) === BOOKS_URL)
		return substr($url, strlen(BOOKS_URL));

	return '';
}

/**
 * Check whether current url is sub-url of books url.
 * @param $url url
 * @return true if books sub-url
 */
function is_books_sub_url()
{
	return books_sub_url(current_url()) ? true : false;
}

/**
 * Get remaining path component under books path
 * of given path.
 * @param $path path
 * @return books sub-path
 */
function books_sub_path($path)
{
	if (substr($path, 0, strlen(BOOKS_PATH)) === BOOKS_PATH)
		return substr($path, strlen(BOOKS_PATH));

	return '';
}

/**
 * Convert books url to books path.
 * @param $url books url
 * @return books path
 */
function books_url2path($url)
{
	return BOOKS_PATH . books_sub_url($url);
}

/**
 * Convert books path to books url.
 * @param $path books path
 * @return books url
 */
function books_path2url($path)
{
	return BOOKS_URL . books_sub_path($path);
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
	if (is_books_sub_url())
	{
		$path = books_url2path(current_url());
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
