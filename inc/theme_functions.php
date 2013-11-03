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
	if (defined('THEME_ROOT'))
	{
		$theme_file = THEME_ROOT . $filename;
		if (file_exists($theme_file))
		{
			$mobipocket = get_mod_mobipocket();

			include_once($theme_file);
		}
	}
}

/**
 * Display theme css.
 */
function theme_css()
{
	// default css
	$css_path = THEME_ROOT . 'css/' . THEME_NAME . '.css';
	$css_uri = THEME_URI . 'css/' . THEME_NAME . '.css';

	if (is_file($css_path))
	{
?>
<link rel="stylesheet" href="<?php echo $css_uri; ?>" type="text/css" media="screen" />
<?php
	}

	// ie css
	$css_path = THEME_ROOT . 'css/ie.css';
	$css_uri = THEME_URI . 'css/ie.css';

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
	$js_path = THEME_ROOT . 'js/' . THEME_NAME . '.js';
	$js_uri = THEME_URI . 'js/' . THEME_NAME . '.js';

	if (is_file($js_path))
	{
?>
<script type="text/javascript" src="<?php echo $js_uri; ?>"></script>
<?php
	}
}

?>
