<?php
/**
 * footer.php
 * 
 * (c)2013 mrdragonraaar.com
 */
require_once(__DIR__ . '/inc/functions.php');
?>

<!-- ReadMe -->
<div id="readme">
<?php readme(); ?>
</div>
<!-- END ReadMe -->

<?php

if (!is_site_uri()) theme_footer(isset($mobipocket) ? $mobipocket : null);
?>
</body>
</html>
