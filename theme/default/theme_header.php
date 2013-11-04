<?php
/**
 * theme_header.php
 * 
 * (c)2013 mrdragonraaar.com
 */
if (basename($_SERVER['PHP_SELF']) == 'theme_header.php')
	die('You cannot load this page directly.');

require_once(__DIR__ . '/config.php');
?>
<!-- Header -->
<div id="header">
<div id="header_content">

<!-- Logo -->
<div id="logo">
<a title="<?php echo site_title(); ?>" href="<?php echo site_uri(); ?>"><img alt="<?php echo site_title(); ?>" src="<?php echo theme_logo(); ?>"></a>
</div>
<!-- END Logo -->

<!-- Dropdown Menu -->
<?php if (function_exists('dropdown')) dropdown(); ?>
<!-- END Dropdown Menu -->

<!-- Search Box -->
<?php if (!is_kindle()) { ?>
<div id="searchbox">
<form method="get">
<input id="search" name="P" type="text" value="<?php echo search_pattern(); ?>" />
<img src="<?php echo icon_search(); ?>" />
</form>
</div>
<?php } ?>
<!-- END Search Box -->

<!-- Links -->
<?php if (!is_kindle()) { ?>
<?php if (function_exists('links')) links(); ?>
<?php } ?>
<!-- END Links -->

</div>
</div>
<!-- END Header -->

<!-- Books / MOBIPocket -->
<?php if (is_mod_mobipocket()) { ?>
<div id="mobipocket">
<?php } else { ?>
<div id="books">
<?php } ?>

<!-- Latest -->
<?php if (is_books_uri() && !is_kindle()) { ?>
<?php if (function_exists('latest')) latest(); ?>
<?php } ?>
<!-- END Latest -->

<!-- Alphabet Links -->
<?php if (is_books_uri()) { ?>
<?php if (function_exists('alphabet')) alphabet(); ?>
<?php } ?>
<!-- END Alphabet Links -->

<!-- Directory Heading -->
<?php if (!is_books_uri() && is_books_sub_uri() && !is_mod_mobipocket()) { ?>
<h1 class="ebooklibrary_title">
<a title="<?php echo basename(current_uri()); ?>" href="<?php echo current_uri(); ?>"><?php echo basename(current_uri()); ?></a>
<?php if (search_pattern()) { ?>
<span class="ebooklibrary_search_pattern">(Search: <?php echo search_pattern(); ?>)</span>
<?php } ?>
</h1>
<?php } ?>
<!-- END Directory Heading -->
