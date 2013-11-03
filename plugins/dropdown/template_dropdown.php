<?php
/**
 * template_dropdown.php
 * 
 * (c)2013 mrdragonraaar.com
 */
if (basename($_SERVER['PHP_SELF']) == 'template_dropdown.php')
	die('You cannot load this page directly.');

$mobipocket = get_mod_mobipocket();
?>
<div id="dropdown">
<!-- Base Menu -->
<?php if (isset($mobipocket)) { ?>
<a title="<?php echo $mobipocket->title(); ?>" id="collapsed" class="basemenu"><img src="<?php echo ICON_MOBI; ?>"/><?php echo dropdown_label($mobipocket->title()); ?></a>
<?php } else { ?>
<a title="<?php echo basename(current_uri()); ?>" id="collapsed" class="basemenu"><img src="<?php echo defined('ICON_PAGE') ? ICON_PAGE : ICON_DIR_OPEN; ?>"/><?php echo dropdown_label(basename(current_uri())); ?></a>
<?php } ?>
<!-- END Base Menu -->
<?php
$path = rtrim(dirname(current_uri()), '/') . '/';
$submenu = basename($path);
?>
<!-- Submenu -->
<div class="submenu">
<ul>
<!-- Directory Menu Items -->
<?php while ($path !== SITE_URI) { ?>
<li><a title="<?php echo $submenu; ?>" href="<?php echo $path; ?>"><img src="<?php echo ICON_DIR_CLOSED; ?>"/><?php echo dropdown_label($submenu); ?></a></li>
<?php 
$path = rtrim(dirname($path), '/') . '/';
$submenu = basename($path);
} ?>
<!-- END Directory Menu Items -->
<!-- Site Menu Item -->
<li><a title="<?php echo SITE_TITLE; ?>" href="<?php echo SITE_URI; ?>"><img src="<?php echo ICON_SITE; ?>"/><?php echo dropdown_label(SITE_TITLE); ?></a></li>
<!-- END Site Menu Item -->
</ul>
</div>
<!-- END Submenu -->
</div>
