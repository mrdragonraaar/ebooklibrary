<?php
/**
 * Dropdown.php
 * 
 * (c)2013 mrdragonraaar.com
 */
if (!defined('DROPDOWN_LABEL_WIDTH'))
	define('DROPDOWN_LABEL_WIDTH', 24);

/**
 * Dropdown menu
 */
class Dropdown extends Template
{
	/**
	 * Create new dropdown menu instance.
	 */
	function __construct()
	{
		parent::__construct('dropdown');
	}

	/**
	 * Get shortened label text for dropdown menu.
	 * @param $text text to shorten
	 * @return shortened label text
	 */
	static public function label($text)
	{
		return strlen($text) > DROPDOWN_LABEL_WIDTH ?
		   substr($text, 0, DROPDOWN_LABEL_WIDTH) . '...' :
		   $text;
	}
}

?>
