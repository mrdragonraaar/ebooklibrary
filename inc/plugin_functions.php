<?php
/**
 * plugin_functions.php
 * 
 * (c)2013 mrdragonraaar.com
 */
if (basename($_SERVER['PHP_SELF']) == 'plugin_functions.php')
	die('You cannot load this page directly.');

require_once(__DIR__ . '/config.php');
require_once(__DIR__ . '/site_functions.php');

// plugin config
$GLOBALS['_EBOOKLIBRARY']['PLUGINS_CONFIG'] = array();
// plugin css filenames
$GLOBALS['_EBOOKLIBRARY']['PLUGINS_CSS'] = array();
// plugin javascript filenames
$GLOBALS['_EBOOKLIBRARY']['PLUGINS_JS'] = array();

// load plugins
load_plugins();

/**
 * Get the plugins uri.
 * @return plugins uri
 */
function plugins_uri()
{
	return get_config_param('PLUGINS_URI');
}

/**
 * Get the plugins root.
 * @return plugins root
 */
function plugins_root()
{
	return get_config_param('PLUGINS_ROOT');
}

/**
 * Get names of all plugins.
 * @return array of plugin names
 */
function plugin_names()
{
	$plugin_names = array();

	if (!is_dir(plugins_root()))
		return $plugin_names;

	if ($dh = opendir(plugins_root()))
	{
		while (false !== ($plugin_name = readdir($dh)))
		{
			if ($plugin_name != '.' && $plugin_name != '..')
			{
				$plugin_names[] = $plugin_name;
			}
		}

		closedir($dh);
	}

	return $plugin_names;
}

/**
 * Load all plugins.
 */
function load_plugins()
{
	foreach (plugin_names() as $plugin_name)
	{
		$plugin_file = plugins_root() . "$plugin_name/$plugin_name.php";
		if (file_exists($plugin_file))
			require_once($plugin_file);
	}
}

/**
 * Get param from plugins config.
 * @param $param plugins config param
 * @return plugins config value
 */
function get_plugin_config($param)
{
	$PLUGINS_CONFIG = get_config_param('PLUGINS_CONFIG');

	if (isset($PLUGINS_CONFIG[$param]))
		return $PLUGINS_CONFIG[$param];

	return null;
}

/**
 * Set param in plugins config.
 * @param $param plugins config param
 * @param $value plugins config value
 * @return plugins config value
 */
function set_plugin_config($param, $value)
{
	$PLUGINS_CONFIG = &get_config_param('PLUGINS_CONFIG');

	return $PLUGINS_CONFIG[$param] = $value;
}

/**
 * Register plugin css.
 * @param $plugin_name name of plugin
 * @param $css relative path to css
 */
function register_plugin_css($plugin_name, $css)
{
	$PLUGINS_CSS = &get_config_param('PLUGINS_CSS');

	$css_path = plugins_root() . "$plugin_name/$css";
	$css_uri = plugins_uri() . "$plugin_name/$css";

	if (is_file($css_path) && !in_array($css_uri, $PLUGINS_CSS))
	{
		$PLUGINS_CSS[] = $css_uri;
	}
}

/**
 * Display all registered plugin css.
 */
function plugins_css()
{
	$PLUGINS_CSS = get_config_param('PLUGINS_CSS');

	foreach ($PLUGINS_CSS as $css_uri)
	{
?>
<link rel="stylesheet" href="<?php echo $css_uri; ?>" type="text/css" media="screen" />
<?php
	}
}

/**
 * Register plugin javascript.
 * @param $plugin_name name of plugin
 * @param $css relative path to javascript
 */
function register_plugin_js($plugin_name, $js)
{
	$PLUGINS_JS = &get_config_param('PLUGINS_JS');

	$js_path = plugins_root() . "$plugin_name/$js";
	$js_uri = plugins_uri() . "$plugin_name/$js";

	if (is_file($js_path) && !in_array($js_uri, $PLUGINS_JS))
	{
		$PLUGINS_JS[] = $js_uri;
	}
}

/**
 * Display all registered plugin javascript.
 */
function plugins_js()
{
	$PLUGINS_JS = get_config_param('PLUGINS_JS');

	foreach ($PLUGINS_JS as $js_uri)
	{
?>
<script type="text/javascript" src="<?php echo $js_uri; ?>"></script>
<?php
	}
}

?>
