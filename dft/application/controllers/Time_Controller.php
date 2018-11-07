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

    /**
     * Distance_Controller constructor.
     */
    public function __construct() {
        parent::__construct();
        /**
         * loading helper and libraries
         */
        $this->load->helper(array('form','cookie','url'));
        $this->load->library('form_validation');
        $this->load->library('calculate');

        $this->lang->load(get_cookie('dft_lang'),get_cookie('dft_lang'));
    }

    /**
     * @return void
     */
    function index() {
        if (get_cookie('dft_lang') == null) {
            redirect('');
        }
        self::generate_page('','','','');
    }

    /**
     * @return void
     */
    public function display() {

        $config = array(
            array(
                'field' => 'inputDistance',
                'label' => 'inputDistance',
                'rules' => array(
                    'required',
                    'numeric'
                ),
                'errors' => array(
                    'required' => $this->lang->line('form_provide') . ' ' . $this->lang->line('Distance'),
                    'numeric'  => $this->lang->line('Distance') . ' ' . $this->lang->line('form_contain_i_d')
                ),
            ),
            array(
                'field' => 'inputSpeed',
                'label' => 'inputSpeed',
                'rules' => array(
                    'required',
                    'numeric'
                ),
                'errors' => array(
                    'required' => $this->lang->line('form_provide') . ' ' . $this->lang->line('Speed'),
                    'numeric'  => $this->lang->line('Speed') . ' ' . $this->lang->line('form_contain_i_d')
                ),
            ),
        );

        $this->form_validation->set_rules($config);

        /**
         * Validate form
         */
        $formData = array(
            'inputDistance'   => $this->input->post('inputDistance'),
            'inputSpeed'  => $this->input->post('inputSpeed')
        );

        if ($this->form_validation->run() == FALSE) {
            /**
             * Visit the page from URL and not form
             */
            if (validation_errors() == FALSE) {
                redirect('');
            }
            else {
                /**
                 * Missing information
                 */
                self::generate_page('error', validation_errors(), $formData['inputDistance'], $formData['inputSpeed']);
            }
        }
        else {
            $value_distance = $formData['inputDistance'];
            $value_speed = $formData['inputSpeed'];

            $result =$this->calculate->minute_to_hour(round(($value_distance / $value_speed) * 60,0),
                $this->lang->line('short_hour'),$this->lang->line('minute'));

           self::generate_page('success', $result, $formData['inputDistance'], $formData['inputSpeed']);
        }
    }

    /**
     * @param $rv
     * @param $rtu
     * @param $inm
     * @param $is
     */
    private function generate_page($rv, $rtu, $inm, $is) {
        $data['frmName'] = 'dft';
        $data['frmInput'] = 'inputDistance';

        $data['sUrl'] = 'http://' . $_SERVER['SERVER_NAME'];
        $data['title'] = $this->lang->line('dsT');
        $data['header'] = $this->lang->line('Time');
        $data['estHeader'] = $this->lang->line('Est_time');
        $data['language'] = $this->lang->line('language');
        $data['back'] = $this->lang->line('back');
        $data['distance'] = $this->lang->line('Distance');
        $data['speed'] = $this->lang->line('Speed');
        $data['knot'] = $this->lang->line('knot');
        $data['calculate'] = $this->lang->line('Calculate');
        $data['shortNauticalMiles'] = $this->lang->line('short_nautical_miles');

        $data['ResponseValue'] = '';
        $data['ResponseToUser'] = '';
        $data['ValueDistance'] = '';
        $data['ValueSpeed'] = '';
        /**
         * if missing information
         */
        if ($rv == TRUE) {
            $data['ResponseValue'] = $rv;
            $data['ResponseToUser'] = $rtu;
            $data['ValueDistance'] = $inm;
            $data['ValueSpeed'] = $is;
        }

        $this->load->view('Time_View',$data);
    }

}