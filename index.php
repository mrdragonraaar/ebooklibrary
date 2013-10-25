<?php
/**
 * index.php
 * 
 * (c)2013 mrdragonraaar.com
 */
require_once('inc/functions.php');
require_once('inc/template_functions.php');
?>
<!DOCTYPE html>
<html>
<head>
<title><?php echo SITE_TITLE; ?></title>
<link rel="shortcut icon" href="<?php echo ICON_SITE; ?>" />
<link rel="stylesheet" href="/global/css/icons/css-social-icons/css-social-icons.php" type="text/css" media="screen" />
<link rel="stylesheet" href="<?php echo CSS_URI; ?>ebooklibrary.css" type="text/css" media="screen" />
</head>

<body>
<!-- Title Screen -->
<div id="title">
<!-- Login -->
<a id="login" title="<?php echo SITE_TITLE; ?>" href="<?php echo BOOKS_URI; ?>"><img id="kindle" src="<?php echo IMG_URI; ?>kindle.jpg"/><img id="logo" src="<?php echo LOGO_URI; ?>"/></a>
<!-- END Login -->

<!-- Links -->
<?php template_links(); ?>
<!-- END Links -->
</div>
<!-- END Title Screen -->
</body>
</html>
