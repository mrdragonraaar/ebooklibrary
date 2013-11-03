<?php
/**
 * header.php
 * 
 * (c)2013 mrdragonraaar.com
 */
require_once(__DIR__ . '/inc/functions.php');
?>
<!DOCTYPE html>
<html>
<head>
<title><?php echo SITE_TITLE; ?><?php if (!is_site_uri()) { ?> | <?php echo isset($mobipocket) ? $mobipocket->title() : basename(current_uri()); ?><?php } ?></title>
<meta http-equiv="Pragma" content="no-cache">
<meta http-equiv="Expires" content="-1">
<meta charset="utf-8">
<link rel="shortcut icon" href="<?php echo ICON_SITE; ?>" />
<?php plugins_css(); ?>
<?php theme_css(); ?>
<script type="text/javascript" src="/global/js/jquery/jquery.min.js"></script>
<script type="text/javascript" src="/global/js/jquery/jquery.tools.min.js"></script>
<?php plugins_js(); ?>
<?php theme_js(); ?>
</head>

<body<?php if (is_kindle()) { ?> class="kindle"<?php } ?>>
<?php if (!is_site_uri()) { ?>
<?php theme_header(); ?>
<?php } ?>
