<?php
/**
 * alphabet.php
 * 
 * (c)2013 mrdragonraaar.com
 */
if (basename($_SERVER['PHP_SELF']) == 'alphabet.php')
	die('You cannot load this page directly.');
?>
<div id="alphabet">
<a class="letter<?php if (!search_pattern()) echo ' selected'; ?>" title="All" href="<?php echo current_url(); ?>">All</a>
<?php
for ($i = 65; $i <= 90; $i++) {
$letter = chr($i);
$selected = false;
if (search_pattern() == "$letter*") $selected = true;
?>
|<a class="letter<?php if ($selected) echo ' selected'; ?>" title="<?php echo $letter; ?>" href="?P=<?php echo $letter; ?>*"><?php echo $letter; ?></a>
<?php } ?>
</div>
