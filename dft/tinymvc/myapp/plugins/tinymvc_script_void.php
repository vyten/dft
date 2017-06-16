<?php 
/**
 * tiny_script_void.php
 *
 * small global functions which does not return any value
 *
 * @package		TinyMVC
 * @author		Urban Bjorken <urban.bjorken@skalarit.se>
 * @version 1.0
 * @since      File available since Release 1.0
 */

/**
 *
 * @param string $url
 * @return void
 */
function funcVoidRedirectBasic($url) {
	header('Location: ' . $url);
	return;
}

/**
 *
 * @param string $url
 * @param string $replace
 * @param number $statusCode
 * @return void
 */
function funcVoidRedirectAdv($url, $replace = true, $statusCode = 200) {
	header('Location: ' . $url, $replace, $statusCode);
	return;
}