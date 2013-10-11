<?php
/**
 * Template.php
 * 
 * (c)2013 mrdragonraaar.com
 */
require_once(__DIR__ . '/../functions.php');

/**
 * Template
 */
class Template
{
	protected $name;

	/**
	 * Create new template instance.
	 * @param $name template name
	 */
	function __construct($name)
	{
		$this->name = $name;
	}

	/**
	 * Get template filename.
	 * @return template filename
	 */
	public function template_filename()
	{
		return TEMPLATE_PATH . '/' . $this->name . '.php';
	}

	/**
	 * Display template.
	 * @param $template_args arguments to pass to template
	 */
	public function template($template_args = null)
	{
		echo $this->return_template($template_args);
	}

	/**
	 * Get template.
	 * @param $template_args arguments to pass to template
	 * @return template html
	 */
	public function return_template($template_args = null)
	{
		if (file_exists($this->template_filename()))
		{
			ob_start();
			include($this->template_filename());
			return ob_get_clean();
		}
	}
}

?>
