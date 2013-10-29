<?php
/**
 * template_links.php
 * 
 * (c)2013 mrdragonraaar.com
 */
if (basename($_SERVER['PHP_SELF']) == 'template_links.php')
	die('You cannot load this page directly.');
?>
<div id="links">
<?php
foreach (get_links() as $link)
{
?><a target="_blank" title="<?php echo $link->title; ?>" href="<?php echo reset($link->urls()); ?>"><img src="<?php echo $link->icon; ?>" /></a><?php
}
?>
</div>
