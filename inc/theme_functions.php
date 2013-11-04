<?php
/**
 * theme_functions.php
 * 
 * (c)2013 mrdragonraaar.com
 */
if (basename($_SERVER['PHP_SELF']) == 'theme_functions.php')
	die('You cannot load this page directly.');

require_once(__DIR__ . '/config.php');
require_once(__DIR__ . '/site_functions.php');

// theme config
$GLOBALS['_EBOOKLIBRARY']['THEME_CONFIG'] = array();

/**
 * Get the theme name.
 * @return theme name
 */
function theme_name()
{
	return get_config_param('THEME_NAME');
}

/**
 * Get the theme uri.
 * @return theme uri
 */
function theme_uri()
{
	return get_config_param('THEME_URI');
}

/**
 * Get the theme root.
 * @return theme root
 */
function theme_root()
{
	return get_config_param('THEME_ROOT');
}

/**
 * Display theme header.
 * @param $mobipocket mobipocket book
 */
function theme_header()
{
	theme_file('theme_header.php');
}

/**
 * Display theme footer.
 * @param $mobipocket mobipocket book
 */
function theme_footer()
{
	theme_file('theme_footer.php');
}

/**
 * Display theme front page.
 */
function theme_front()
{
	theme_file('theme_front.php');
}

/**
 * Display theme file.
 * @param $filename theme file
 */
function theme_file($filename)
{
	$theme_file = theme_root() . $filename;
	if (file_exists($theme_file))
	{
		$mobipocket = get_mod_mobipocket();

		include_once($theme_file);
	}
}

/**
 * Get param from theme config.
 * @param $param theme config param
 * @return theme config value
 */
function get_theme_config($param)
{
	$THEME_CONFIG = get_config_param('THEME_CONFIG');

	if (isset($THEME_CONFIG[$param]))
		return $THEME_CONFIG[$param];

	return null;
}

/**
 * Set param in theme config.
 * @param $param theme config param
 * @param $value theme config value
 * @return theme config value
 */
function set_theme_config($param, $value)
{
	$THEME_CONFIG = &get_config_param('THEME_CONFIG');

	return $THEME_CONFIG[$param] = $value;
}

/**
 * Display theme css.
 */
function theme_css()
{
	// default css
	$css_path = theme_root() . 'css/' . theme_name() . '.css';
	$css_uri = theme_uri() . 'css/' . theme_name() . '.css';

	if (is_file($css_path))
	{
?>
<link rel="stylesheet" href="<?php echo $css_uri; ?>" type="text/css" media="screen" />
<?php
	}

	// ie css
	$css_path = theme_root() . 'css/ie.css';
	$css_uri = theme_uri() . 'css/ie.css';

	if (is_file($css_path))
	{
?>
<!--[if lt IE 8]>
<link rel="stylesheet" href="<?php echo $css_uri; ?>" type="text/css" media="screen" />
<![endif]-->
<?php
	}
}

/**
 * Display theme javascript.
 */
function theme_js()
{
	$js_path = theme_root() . 'js/' . theme_name() . '.js';
	$js_uri = theme_uri() . 'js/' . theme_name() . '.js';

	if (is_file($js_path))
	{
?>
<script type="text/javascript" src="<?php echo $js_uri; ?>"></script>
<?php
	}
}

?>
