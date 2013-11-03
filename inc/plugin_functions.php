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

// plugin css filenames
$PLUGINS_CSS = array();
// plugin javascript filenames
$PLUGINS_JS = array();

// load plugins
load_plugins();

/**
 * Get names of all plugins.
 * @return array of plugin names
 */
function plugin_names()
{
	$plugin_names = array();

	if (!is_dir(PLUGINS_ROOT))
		return $plugin_names;

	if ($dh = opendir(PLUGINS_ROOT))
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
		$plugin_file = PLUGINS_ROOT . "$plugin_name/$plugin_name.php";
		if (file_exists($plugin_file))
			require_once($plugin_file);
	}
}

/**
 * Register plugin css.
 * @param $plugin_name name of plugin
 * @param $css relative path to css
 */
function register_plugin_css($plugin_name, $css)
{
	global $PLUGINS_CSS;
	if (!isset($PLUGINS_CSS)) $PLUGINS_CSS = array();

	$css_path = PLUGINS_ROOT . "$plugin_name/$css";
	$css_uri = PLUGINS_URI . "$plugin_name/$css";

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
	global $PLUGINS_CSS;

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
	global $PLUGINS_JS;
	if (!isset($PLUGINS_JS)) $PLUGINS_JS = array();

	$js_path = PLUGINS_ROOT . "$plugin_name/$js";
	$js_uri = PLUGINS_URI . "$plugin_name/$js";

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
	global $PLUGINS_JS;

	foreach ($PLUGINS_JS as $js_uri)
	{
?>
<script type="text/javascript" src="<?php echo $js_uri; ?>"></script>
<?php
	}
}

?>
