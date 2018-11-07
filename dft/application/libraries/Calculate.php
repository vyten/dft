<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Calculate.php
 *
 * [description]
 *
 * @package  CodeIgniter Version 3.1.9
 * @author   Urban Bjorken <urban.bjorken@skalarit.se>
 * @version  1.0
 * @since    File available since V2.0
 */

/**
 * Class Calculate
 */
Class Calculate {

    /**
     * @param $hour
     * @param $minute
     * @return int
     */
    public function hour_to_minute($hour, $minute) {
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


    public function minute_to_hour($time,$h,$m) {
        $hour = 0;
        $minute = $time;

        if ($minute >= 60) {
            while ($minute >= 60) {
                $minute -= 60;
                ++$hour;
            }
        }
        $result = $hour . ' ' . $h . ' ' . $minute. ' ' . $m;
        return $result;
    }


}


