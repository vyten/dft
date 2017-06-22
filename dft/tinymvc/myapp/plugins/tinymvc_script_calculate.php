<?php 
/**
 * tiny_script_calculate.php
 *
 * calculate the enduser input from webform
 *
 * @package		TinyMVC
 * @author		Urban Bjorken <vyten@munet.nu>
 * @version 1.0
 * @since      File available since Release 1.0
 */

/**
 * 
 * @param int $hour
 * @param int $minute
 * @return int
 */
function funcHourToMinute($hour, $minute) {
	$th = $hour;
	$tm = $minute;
	
	if (!$th == 0) {
		while ($th > 0) {
			$tm += 60;
			--$th;
		}
	}
	return $tm;
}

/**
 * 
 * @param int $time
 * @return string
 */
function funcminuteToHour($time) {
	$hour = 0;
	$minute = $time;
	
	if ($minute >= 60) {
		while ($minute >= 60) {
			$minute -= 60;
			++$hour;
		}
	}
	$result = $hour. ' h ' . $minute. ' minuter';
	return $result;
}
