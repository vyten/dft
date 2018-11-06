<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Time_Controller.php
 *
 * [description]
 *
 * @package  CodeIgniter Version 3.1.9
 * @author   Urban Bjorken <urban.bjorken@skalarit.se>
 * @version  1.0
 * @since    File available since V2.0
 */

/**
 * Class Time_Controller
 */
Class Time_Controller extends CI_Controller {

    function index() {
        self::generate_page();
    }

    /**
     * @return void
     */
    private function generate_page() {
        $this->load->view('Time_View');
    }

}