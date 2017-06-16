<?php 
/**
 * tiny_script_cleaners.php
 *
 * small global functions which clean up strings
 *
 * @package		TinyMVC
 * @author		Urban Björlén <urban.bjorken@skalarit.se>
 * @version 1.0
 * @since      File available since Release 1.0
 */

/**
 *
 * @param string $value
 * @return string
 */
function funcGetSanitizedValue($value) {
	$returnValue = $value;
	
	$bad_chars = array("{", "}", "(", ")", ";", ":", "<", ">", "/","$");
	$returnValue = str_ireplace($bad_chars,"",$returnValue);
	
	/**
	 * removes any html from the string and turns it into < format
	 */
	$returnValue = htmlentities($returnValue);
	
	/**
	 * strips html and PHP tags
	 */
	$returnValue = strip_tags($returnValue);
	
	if (get_magic_quotes_gpc()) {
		/**
		 * gets rid of unwanted quotes
		 */
		$returnValue = stripslashes($returnValue);
	}
	return $returnValue;
}