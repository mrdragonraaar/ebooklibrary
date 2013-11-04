<?php
/**
 * theme_front.php
 * 
 * (c)2013 mrdragonraaar.com
 */
if (basename($_SERVER['PHP_SELF']) == 'theme_front.php')
	die('You cannot load this page directly.');

require_once(__DIR__ . '/config.php');
?>
<!-- Front Page -->
<div id="front">
<!-- Login -->
<a id="login" title="<?php echo site_title(); ?>" href="<?php echo books_uri(); ?>"><img id="kindle" src="<?php echo theme_kindle_img(); ?>"/><img id="logo" src="<?php echo theme_logo(); ?>"/></a>
<!-- END Login -->

<!-- Links -->
<?php if (function_exists('links')) links(); ?>
<!-- END Links -->
</div>
<!-- END Front Page -->
