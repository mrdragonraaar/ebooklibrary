<?php
/**
 * template_dropdown.php
 * 
 * (c)2013 mrdragonraaar.com
 */
if (basename($_SERVER['PHP_SELF']) == 'template_dropdown.php')
	die('You cannot load this page directly.');
?>
<div id="dropdown">
<!-- Base Menu -->
<a title="<?php page_sub_title(); ?>" id="collapsed" class="basemenu"><img src="<?php echo dropdown_basemenu_icon(); ?>"/><?php echo dropdown_basemenu_label(); ?></a>
<!-- END Base Menu -->
<?php
$path = rtrim(dirname(current_uri()), '/') . '/';
$submenu = basename($path);
?>
<!-- Submenu -->
<div class="submenu">
<ul>
<!-- Directory Menu Items -->
<?php while ($path !== site_uri()) { ?>
<li><a title="<?php echo $submenu; ?>" href="<?php echo $path; ?>"><img src="<?php echo icon_dir_closed(); ?>"/><?php echo dropdown_label($submenu); ?></a></li>
<?php 
$path = rtrim(dirname($path), '/') . '/';
$submenu = basename($path);
} ?>
<!-- END Directory Menu Items -->
<!-- Site Menu Item -->
<li><a title="<?php echo site_title(); ?>" href="<?php echo site_uri(); ?>"><img src="<?php echo icon_site(); ?>"/><?php echo dropdown_label(site_title()); ?></a></li>
<!-- END Site Menu Item -->
</ul>
</div>
<!-- END Submenu -->
</div>
