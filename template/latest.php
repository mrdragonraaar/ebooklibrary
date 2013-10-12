<?php
/**
 * latest.php
 * 
 * (c)2013 mrdragonraaar.com
 */
if (basename($_SERVER['PHP_SELF']) == 'latest.php')
	die('You cannot load this page directly.');

$latest_books = $this->latest_books();
?>
<div id="latest">
<h1><?php echo LATEST_TITLE; ?></h1>

<a class="prev browse left"></a>

<!-- Book Shelf -->
<div class="bookshelf scrollable">
<!-- Items -->
<div class="items">
<?php
$book_count = 0;
foreach ($latest_books as $file => $mtime)
{
	$mobi = new mobipocket();
	if ($mobi->open($file))
	{
		$url = books_path2url($file);

		if ($book_count % LATEST_MAX_SHOW == 0)
		{
			if ($book_count != 0)
			{
?>
</div>
<?
			}
?>

<div>
<?
		}
?>
<a title="<?php echo $mobi->title(); ?> by <?php echo $mobi->author(); ?>" href="<?php echo $url; ?>"><img src="data:image/jpg;base64,<?php echo base64_encode($mobi->cover()); ?>"/></a>
<?php
		$mobi->close();
	}

	$book_count++;
}
?>
</div>

</div>
<!-- END Items -->
</div>
<!-- END Book Shelf -->

<a class="next browse right"></a>

</div>
<script>
$(function()
{
	// initialize scrollable
	$('.scrollable').scrollable();
});
</script>
