<?php
/**
 * header.php
 * 
 * (c)2013 mrdragonraaar.com
 */
require_once(__DIR__ . '/../inc/functions.php');
require_once(__DIR__ . '/../inc/template_functions.php');
?>
<!DOCTYPE html>
<html>
<head>
<title><?php echo SITE_TITLE; ?> | <?php echo isset($mobipocket) ? $mobipocket->title() : basename(current_uri()); ?></title>
<meta http-equiv="Pragma" content="no-cache">
<meta http-equiv="Expires" content="-1">
<meta charset="utf-8">
<link rel="shortcut icon" href="<?php echo ICON_SITE; ?>" />
<link rel="stylesheet" href="/global/css/icons/css-social-icons/css-social-icons.php" type="text/css" media="screen" />
<link rel="stylesheet" href="<?php echo CSS_URI; ?>ebooklibrary.css" type="text/css" media="screen" />
<!--[if lt IE 8]>
<link rel="stylesheet" href="<?php echo CSS_URI; ?>ie.css" type="text/css" media="screen" />
<![endif]-->
<script type="text/javascript" src="/global/js/jquery/jquery.min.js"></script>
<script type="text/javascript" src="/global/js/jquery/jquery.tools.min.js"></script>
</head>

<body<?php if (is_kindle()) { ?> class="kindle"<?php } ?>>
<!-- Header -->
<div id="header">
<div id="header_content">

<!-- Logo -->
<div id="logo">
<a title="<?php echo SITE_TITLE; ?>" href="<?php echo SITE_URI; ?>"><img alt="<?php echo SITE_TITLE; ?>" src="<?php echo LOGO_URI; ?>"></a>
</div>
<!-- END Logo -->

<!-- Dropdown Menu -->
<?php template_dropdown(isset($mobipocket) ? $mobipocket : null); ?>
<!-- END Dropdown Menu -->

<!-- Search Box -->
<?php if (!is_kindle()) { ?>
<div id="searchbox">
<form method="get">
<input id="search" name="P" type="text" value="<?php echo search_pattern(); ?>" />
<img src="<?php echo ICON_SEARCH; ?>" />
</form>
</div>
<?php } ?>
<!-- END Search Box -->

<!-- Links -->
<?php if (!is_kindle()) { ?>
<?php template_links(); ?>
<?php } ?>
<!-- END Links -->

</div>
</div>
<!-- END Header -->

<!-- Books / MOBIPocket -->
<?php if (isset($mobipocket)) { ?>
<div id="mobipocket">
<?php } else { ?>
<div id="books">
<?php } ?>

<!-- Latest -->
<?php if (is_books_uri() && !is_kindle()) { ?>
<?php template_latest(); ?>
<?php } ?>
<!-- END Latest -->

<!-- Alphabet Links -->
<?php if (is_books_uri()) { ?>
<?php template_alphabet(); ?>
<?php } ?>
<!-- END Alphabet Links -->

<!-- Directory Heading -->
<?php if (!is_books_uri() && is_books_sub_uri() && !isset($mobipocket)) { ?>
<h1 class="ebooklibrary_title">
<a title="<?php echo basename(current_uri()); ?>" href="<?php echo current_uri(); ?>"><?php echo basename(current_uri()); ?></a>
<?php if (search_pattern()) { ?>
<span class="ebooklibrary_search_pattern">(Search: <?php echo search_pattern(); ?>)</span>
<?php } ?>
</h1>
<?php } ?>
<!-- END Directory Heading -->
