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
	return current_uri() === site_uri();
}

/**
 * Get the site uri.
 * @return site uri
 */
function site_uri()
{
	return get_config_param('SITE_URI');
}

/**
 * Get the site root.
 * @return site root
 */
function site_root()
{
	return get_config_param('SITE_ROOT');
}

/**
 * Get the books dir.
 * @return books dir
 */
function books_dir()
{
	return get_config_param('BOOKS_DIR');
}

/**
 * Check whether current uri is books uri.
 * @return true if current uri is books uri
 */
function is_books_uri()
{
	return current_uri() === books_uri();
}

/**
 * Get the books uri.
 * @return books uri
 */
function books_uri()
{
	return get_config_param('BOOKS_URI');
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

	if (substr($uri, 0, strlen(books_uri())) === books_uri())
		return substr($uri, strlen(books_uri()));

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
 * Get the books root.
 * @return books root
 */
function books_root()
{
	return get_config_param('BOOKS_ROOT');
}

/**
 * Get remaining path component under books path
 * of given path.
 * @param $path path
 * @return books sub-path
 */
function books_sub_path($path)
{
	if (substr($path, 0, strlen(books_root())) === books_root())
		return substr($path, strlen(books_root()));

	return '';
}

/**
 * Convert books uri to books path.
 * @param $uri books uri
 * @return books path
 */
function books_uri2path($uri)
{
	return books_root() . books_sub_uri($uri);
}

/**
 * Convert books path to books uri.
 * @param $path books path
 * @return books uri
 */
function books_path2uri($path)
{
	return books_uri() . books_sub_path($path);
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
 * Get the site title.
 * @return site title
 */
function site_title()
{
	return get_config_param('SITE_TITLE');
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
		return site_title();

	return site_title() . ' | ' . return_page_sub_title();
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

	if (page_title_config())
		return page_title_config();

	return basename(current_uri());
}

/**
 * Get page title from config.
 * @return page title.
 */
function page_title_config()
{
	return get_config_param('PAGE_TITLE');
}

/**
 * Set page title in config.
 * @param $page_title page title.
 * @return page title.
 */
function set_page_title_config($page_title)
{
	global $_EBOOKLIBRARY;

	return $_EBOOKLIBRARY['PAGE_TITLE'] = $page_title;
}
function set_page_title($page_title) { return set_page_title_config($page_title); }

/**
 * Get directory index search pattern.
 * @return search pattern
 */
function search_pattern()
{
	return array_key_exists('P', $_GET) ? $_GET['P'] : '';
}

/**
 * Get site icon.
 * @return site icon
 */
function icon_site() { return icon('SITE'); }

/**
 * Get search icon.
 * @return search icon
 */
function icon_search() { return icon('SEARCH'); }

/**
 * Get dir open icon.
 * @return dir open icon
 */
function icon_dir_open() { return icon('DIR_OPEN'); }

/**
 * Get dir closed icon.
 * @return dir closed icon
 */
function icon_dir_closed() { return icon('DIR_CLOSED'); }

/**
 * Get mobi icon.
 * @return mobi icon
 */
function icon_mobi() { return icon('MOBI'); }

/**
 * Get page icon.
 * @return page icon
 */
function icon_page() { return icon('PAGE'); }

/**
 * Set page icon.
 * @param $icon_uri uri of page icon.
 * @return page icon
 */
function set_icon_page($icon_uri) { return set_icon('PAGE', $icon_uri); }
function set_page_icon($icon_uri) { return set_icon_page($icon_uri); }

/**
 * Get icon from config.
 * @param $icon_name name of icon.
 * @return icon
 */
function icon($icon_name)
{
	$ICONS = get_config_param('ICONS');

	if (isset($ICONS[$icon_name]))
		return $ICONS[$icon_name];

	return null;
}

/**
 * Set icon in config.
 * @param $icon_name name of icon.
 * @param $icon_uri uri of icon.
 * @return icon
 */
function set_icon($icon_name, $icon_uri)
{
	$ICONS = &get_config_param('ICONS');

	return $ICONS[$icon_name] = $icon_uri;
}

/**
 * Get array of books in specified directory.
 * @param $dir directory
 * @param $books array of books
 * @return new array of books
 */
function books($dir = null, $books = array())
{
	if (!isset($dir))
		$dir = books_root();

	if (!is_dir($dir))
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
