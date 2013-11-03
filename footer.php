<?php
/**
 * footer.php
 * 
 * (c)2013 mrdragonraaar.com
 */
require_once(__DIR__ . '/inc/functions.php');
?>

<!-- ReadMe -->
<?php if (function_exists('readme')) readme(); ?>
<!-- END ReadMe -->

<?php

if (!is_site_uri()) theme_footer();
?>
</body>
</html>
