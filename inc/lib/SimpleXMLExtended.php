<?php
/**
 * SimpleXMLExtended.php
 * 
 * (c)2013 mrdragonraaar.com
 */
if (basename($_SERVER['PHP_SELF']) == 'SimpleXMLExtended.php')
	die('You cannot load this page directly.');

/**
 * Extend SimpleXMLElement to allow CData.
 */
class SimpleXMLExtended extends SimpleXMLElement
{
	/**
 	 * Add CData.
 	 * @param $cdata_text cdata text
 	 */
	public function addCData($cdata_text)
	{
		$node = dom_import_simplexml($this); 
		$no = $node->ownerDocument; 
		$node->appendChild($no->createCDATASection($cdata_text)); 
	} 
}

?>
