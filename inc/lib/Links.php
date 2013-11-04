<?php
/**
 * Links.php
 * 
 * (c)2013 mrdragonraaar.com
 */
if (basename($_SERVER['PHP_SELF']) == 'Links.php')
	die('You cannot load this page directly.');

require_once(__DIR__ . '/../config.php');
require_once(__DIR__ . '/SimpleXMLExtended.php');

$GLOBALS['_EBOOKLIBRARY']['LINKS_DATA'] = $GLOBALS['_EBOOKLIBRARY']['DATA_ROOT'] . 'links.xml';

/**
 * Links
 */
class Links
{
	protected $links;

	/**
 	 * Create a new Links instance.
 	 */
	function __construct()
	{
		$this->_init();
	}

	/**
 	 * Initialise Links instance.
 	 */
	private function _init()
	{
		$this->links = array();
	}

	/**
 	 * Get an array of links.
 	 * @return array of links
 	 */
	public function links()
	{
		return $this->links;
	}

	/**
 	 * Get a link by id.
 	 * @param $id id
 	 * @return link
 	 */
	public function link($id)
	{
		return isset($this->links[$id]) ? $this->links[$id] : null;
	}

	/**
 	 * Get a link by title.
 	 * @param $title title
 	 * @return link
 	 */
	public function link_by_title($title)
	{
		foreach ($this->links as $link)
		{
			if ($link->title === $title)
				return $link;
		}

		return null;
	}

	/**
 	 * Add a link.
 	 * @param $link link
 	 * @return link
 	 */
	public function add_link(Link $link)
	{
		return $this->links[] = $link;
	}

	/**
 	 * Set a link.
 	 * @param $id id
 	 * @param $link link
 	 * @return link
 	 */
	public function set_link($id, Link $link)
	{
		return $this->links[$id] = $link;
	}

	/**
 	 * Remove a link.
 	 * @param $id id
 	 */
	public function remove_link($id)
	{
		unset($this->links[$id]);
	}

	/**
 	 * Load links.
 	 */
	public function load()
	{
		$LINKS_DATA = get_config_param('LINKS_DATA');

		if (!is_file($LINKS_DATA))
			return null;

		$this->_init();

		$xml = file_get_contents($LINKS_DATA);
	
		$xml_links = simplexml_load_string($xml, 'SimpleXMLExtended');
		foreach ($xml_links->children() as $xml_link)
		{
			$this->set_link_from_xml($xml_link);
		}
	}

	/**
 	 * Set a link from a given SimpleXMLElement.
 	 * @param $xml_elem SimpleXMLElement
 	 * @return link
 	 */
	protected function set_link_from_xml($xml_elem)
	{
		$id = (int)$xml_elem->id;
		$link = Link::from_xml_element($xml_elem);
		if (isset($link))
			return $this->set_link($id, $link);

		return null;
	}

	/**
 	 * Save links.
 	 */
	public function save()
	{
		$LINKS_DATA = get_config_param('LINKS_DATA');

		$data = new SimpleXMLExtended('<?xml version="1.0" encoding="UTF-8"?><links></links>');

		foreach ($this->links as $id => $link)
		{
			$xml_link = $data->addChild('link');
			$elem = $xml_link->addChild('id');
			$elem->addCData($id);
			$link->to_xml_element($xml_link);
		}

		return $data->asXML($LINKS_DATA);
	}
}

/**
 * Link
 */
class Link
{
	public $title;
	public $icon;
	protected $urls;

	/**
 	 * Create a new Link instance.
 	 */
	function __construct()
	{
		$this->_init();
	}

	/**
 	 * Initialise Link instance.
 	 */
	private function _init()
	{
		$this->title = '';
		$this->icon = '';
		$this->urls = array();
	}

	/**
 	 * Get an array of urls.
 	 * @return array of urls
 	 */
	public function urls()
	{
		return $this->urls;
	}

	/**
 	 * Get an url by label.
 	 * @param $label label
 	 * @return url
 	 */
	public function url($label)
	{
		return isset($this->url[$label]) ? $this->url[$label] : null;
	}

	/**
 	 * Add an url.
 	 * @param $label label
 	 * @param $url url text
 	 * @return url
 	 */
	public function add_url($label, $url)
	{
		return $this->urls[$label] = $url;
	}

	/**
 	 * Remove an url.
 	 * @param $label label
 	 */
	public function remove_url($label)
	{
		unset($this->urls[$label]);
	}

	/**
 	 * Add link to given SimpleXMLElement.
 	 * @param $xml_elem SimpleXMLElement
 	 */
	public function to_xml_element(&$xml_elem)
	{
		$elem = $xml_elem->addChild('title');
		$elem->addCData($this->title);
		$elem = $xml_elem->addChild('icon');
		$elem->addCData($this->icon);
		$urls = $xml_elem->addChild('urls');
		foreach ($this->urls as $label => $url)
		{
			$elem = $urls->addChild('url');
			$elem->addCData($url);
			$elem->addAttribute('label', $label);
		}
	}

	/**
 	 * Get link for given SimpleXMLElement.
 	 * @param $xml_elem SimpleXMLElement
 	 * @return link
 	 */
	public static function from_xml_element($xml_elem)
	{
		if (!isset($xml_elem) || !isset($xml_elem->title))
			return null;

		$link = new Link();
		$link->title = (string)$xml_elem->title;
		$link->icon = (string)$xml_elem->icon;
		foreach ($xml_elem->urls->children() as $url)
		{
			$attr = $url->attributes();
			$label = (string)$attr['label'];
			$link->add_url($label, (string)$url);
		}
		
		return $link;
	}
}

?>
