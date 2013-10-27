<?php
/**
 * alphabet.php
 * 
 * (c)2013 mrdragonraaar.com
 */
if (basename($_SERVER['PHP_SELF']) == 'alphabet.php')
	die('You cannot load this page directly.');

/**
 * Display alphabet links plugin.
 */
function alphabet()
{
	echo return_alphabet();
}

/**
 * Get alphabet links plugin.
 * @return alphabet links plugin.
 */
function return_alphabet()
{
	$ALPHABET_TEMPLATE = 'template_alphabet.php';

	ob_start();
	include($ALPHABET_TEMPLATE);
	return ob_get_clean();
}

// register css
register_plugin_css('alphabet', 'css/alphabet.css');

?>
