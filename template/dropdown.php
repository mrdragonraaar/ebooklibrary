<?php
/**
 * dropdown.php
 * 
 * (c)2013 mrdragonraaar.com
 */
if (basename($_SERVER['PHP_SELF']) == 'dropdown.php')
	die('You cannot load this page directly.');

if (isset($template_args))
	$mobipocket = $template_args;
?>
<div id="dropdown">
<!-- Base Menu -->
<?php if (isset($mobipocket)) { ?>
<a title="<?php echo $mobipocket->title(); ?>" id="collapsed" class="basemenu"><img src="<?php echo ICON_MOBI; ?>"/><?php echo Dropdown::label($mobipocket->title()); ?></a>
<?php } else { ?>
<a title="<?php echo basename(current_uri()); ?>" id="collapsed" class="basemenu"><img src="<?php echo ICON_DIR_OPEN; ?>"/><?php echo Dropdown::label(basename(current_uri())); ?></a>
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
<li><a title="<?php echo $submenu; ?>" href="<?php echo $path; ?>"><img src="<?php echo ICON_DIR_CLOSED; ?>"/><?php echo Dropdown::label($submenu); ?></a></li>
<?php 
$path = rtrim(dirname($path), '/') . '/';
$submenu = basename($path);
} ?>
<!-- END Directory Menu Items -->
<!-- Site Menu Item -->
<li><a title="<?php echo SITE_TITLE; ?>" href="<?php echo SITE_URI; ?>"><img src="<?php echo ICON_SITE; ?>"/><?php echo Dropdown::label(SITE_TITLE); ?></a></li>
<!-- END Site Menu Item -->
</ul>
</div>
<!-- END Submenu -->
</div>
<script type="text/javascript">
$(document).ready(function()
{
	$('#dropdown .basemenu').click(function()
	{
		var baseMenuId = $(this).attr('id');
		if (baseMenuId == 'open')
		{
			$('#dropdown .submenu').hide();
			$(this).attr('id', 'collapsed');
		}
		else
		{
			$('#dropdown .submenu').show();
			$(this).attr('id', 'open');
		}
	});

	// Mouse click on sub menu
	$('#dropdown .submenu').mouseup(function()
	{
		return false
	});

	// Mouse click on base menu
	$('#dropdown .basemenu').mouseup(function()
	{
		return false
	});

	// Document Click
	$(document).mouseup(function()
	{
		$('#dropdown .submenu').hide();
		$('#dropdown .basemenu').attr('id', 'collapsed');
	});
});
</script>
