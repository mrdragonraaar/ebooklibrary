<?php
/**
 * template_readme.php
 * 
 * (c)2013 mrdragonraaar.com
 */
if (basename($_SERVER['PHP_SELF']) == 'template_readme.php')
	die('You cannot load this page directly.');
?>
<div id="readme">
<?php
if (is_books_sub_uri())
{
	if (is_file(get_readme_html_filename()))
		echo file_get_contents(get_readme_html_filename());
	else if (is_file(get_readme_txt_filename()))
		echo '<pre>' . file_get_contents(get_readme_txt_filename()) . '</pre>';
}
?>
</div>
