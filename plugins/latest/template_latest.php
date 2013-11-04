<?php
/**
 * template_latest.php
 * 
 * (c)2013 mrdragonraaar.com
 */
if (basename($_SERVER['PHP_SELF']) == 'template_latest.php')
	die('You cannot load this page directly.');
?>
<div id="latest">
<h1><?php echo latest_title(); ?></h1>

<a class="prev browse left"></a>

<!-- Book Shelf -->
<div class="bookshelf scrollable">
<!-- Items -->
<div class="items">
<?php
$book_count = 0;
foreach (array_keys(latest_books(latest_max_books())) as $file)
{
	if ($fh = fopen($file, "r"))
	{
		$mobi = new mobipocket();
		$mobi->read($fh);
		$uri = books_path2uri($file);

		if ($book_count % latest_max_show() == 0)
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
<a title="<?php echo $mobi->title(); ?> by <?php echo $mobi->author(); ?>" href="<?php echo $uri; ?>"><img class="reflect" src="data:image/jpg;base64,<?php echo base64_encode($mobi->cover()); ?>"/></a>
<?php
		fclose($fh);
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
