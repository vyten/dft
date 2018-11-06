<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * FirstTime_Controller.php
 *
 * The first time the visitor comes to the site
 *
 * @package  CodeIgniter Version 3.1.9
 * @author   Urban Bjorken <urban.bjorken@skalarit.se>
 * @version  1.0
 * @since    File available since V2.0
 */

/**
 * Class FirstTime_Controller
 */
Class FirstTime_Controller extends CI_Controller {
    /**
     * FirstTime_Controller constructor.
     */
    public function __construct() {
        parent::__construct();
        /**
         * loading helper and libraries
         */
        $this->load->helper(array('form','cookie','url'));
    }

    /**
     * @return void
     */
    public function index() {
        if (get_cookie('dft_lang') == null) {
            self::generate_flag_page();
        }
        else {
            self::generate_page();
        }
    }

    /**
     * Set cookie
     * @return void
     */
    public function set_language() {
        /**
         * user choice
         */
        $langValue = $this->uri->segment('2');

        /**
         * set selected language
         */
        if ($langValue == "se") {
            set_cookie('dft_lang','se',time() + (86400 * 365));
            redirect('');
        }
        elseif ($langValue == "en") {
            set_cookie('dft_lang','en',time() + (86400 * 365));
            redirect('');
        }
        elseif ($langValue == "cz") {
            set_cookie('dft_lang','cz',time() + (86400 * 365));
            redirect('');
        }
        else {
            self::generate_flag_page();
        }
    }

    /**
     * @return void
     */
    private function generate_flag_page() {
        $data['sUrl'] = 'http://' . $_SERVER['SERVER_NAME'];
        $data['title'] = '¤';
        $data['header'] = '&nbsp;';

        $this->load->view('Flag_View',$data);
    }

    /**
     * @return void
     *
     */
    private function generate_page() {
        $this->lang->load(get_cookie('dft_lang'),get_cookie('dft_lang'));

        $data['sUrl'] = 'http://' . $_SERVER['SERVER_NAME'];
        $data['title'] = $this->lang->line('DST');
        $data['header'] = $this->lang->line('Calculate_your');
        $data['distance'] = $this->lang->line('Distance');
        $data['speed'] = $this->lang->line('Speed');
        $data['time'] = $this->lang->line('Time');

        $this->load->view('FirstTime_View',$data);
    }
}
