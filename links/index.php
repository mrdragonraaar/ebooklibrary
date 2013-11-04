<?php
/**
 * links/index.php
 * 
 * (c)2013 mrdragonraaar.com
 */
require_once(__DIR__ . '/../inc/functions.php');

set_page_title('Book Links');
set_page_icon('/global/icons/fugue-icons/icons/chain.png');

include_once(__DIR__ . '/../header.php');
?>
<!-- Links Page -->
<div id="links_page">

<?php foreach (get_links() as $link) { ?>
<!-- <?php echo $link->title; ?> -->
<div class="link_section">
<h2 class="link_title"><img class="link_icon" src="<?php echo $link->icon; ?>" /><?php echo $link->title; ?></h2>
<?php
foreach ($link->urls() as $label => $url)
{
?>
<div class="link_entry">
<span class="link_label"><?php echo $label; ?></span>
<a target="_blank" href="<?php echo $url; ?>">(<?php echo url_display($url); ?>)</a>
</div>
<?php
}
?>
</div>
<!-- END <?php echo $link->title; ?> -->

<?php } ?>
</div>
<!-- END Links Page -->
<?php
include_once(__DIR__ . '/../footer.php');
?>
