<?php
/**
 * Latest.php
 * 
 * (c)2013 mrdragonraaar.com
 */
require_once('mobipocket/mobipocket.php');

if (!defined('LATEST_TITLE'))
	define('LATEST_TITLE', 'Latest additions');
if (!defined('LATEST_MAX_BOOKS'))
	define('LATEST_MAX_BOOKS', 21);
if (!defined('LATEST_MAX_SHOW'))
	define('LATEST_MAX_SHOW', 7);

/**
 * Latest additions
 */
class Latest extends Template
{
	/**
	 * Create new latest additions instance.
	 */
	function __construct()
	{
		parent::__construct('latest');
	}

	/**
	 * Get sorted array of latest book filenames.
	 */
	public function latest_books()
	{
		$booklist = array();

		$booklist = self::booklist(BOOKS_PATH);
		arsort($booklist);
		$booklist = array_slice($booklist, 0, LATEST_MAX_BOOKS);

		return $booklist;
	}

	/**
	 * Get recursive array of book filenames.
	 * @param $directory directory to search
	 * @param $booklist booklist array to append to
	 * @return new booklist array
	 */
	private static function booklist($directory, $booklist = array())
	{
		if ($fh = opendir($directory))
		{
			while (false !== ($entry = readdir($fh)))
			{
				if (($entry == '.') || ($entry == '..'))
					continue;

				$filename = $directory . $entry;

				if (is_dir($filename))
					$booklist = self::booklist($filename . '/', $booklist);
				else
				{
					if (pathinfo($filename, PATHINFO_EXTENSION) == 'mobi')
						$booklist[$filename] = filemtime($filename);
				}
			}

			closedir($fh);
		}

		return $booklist;
	}
}

?>
