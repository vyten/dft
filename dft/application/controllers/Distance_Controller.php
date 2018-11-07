<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Distance_Controller.php
 *
 * [description]
 *
 * @package  CodeIgniter Version 3.1.9
 * @author   Urban Bjorken <urban.bjorken@skalarit.se>
 * @version  1.0
 * @since    File available since V2.0
 */

/**
 * Class Distance_Controller
 */
Class Distance_Controller extends CI_Controller {

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
            array(
                'field' => 'inputHour',
                'label' => 'inputHour',
                'rules' => array(
                    'required',
                    'integer'
                ),
                'errors' => array(
                    'required' => $this->lang->line('form_provide') . ' ' . $this->lang->line('hour'),
                    'integer'  => $this->lang->line('hour') . ' ' . $this->lang->line('form_contain_i')
                ),
            ),
            array(
                'field' => 'inputMinute',
                'label' => 'inputMinute',
                'rules' => array(
                    'required',
                    'integer'
                ),
                'errors' => array(
                    'required' => $this->lang->line('form_provide') . ' ' . $this->lang->line('minute'),
                    'integer'  => $this->lang->line('minute') . ' ' . $this->lang->line('form_contain_i')
                ),
            ),
        );

        $this->form_validation->set_rules($config);

        /**
         * Validate form
         */
        $formData = array(
            'inputSpeed'  => $this->input->post('inputSpeed'),
            'inputHour'   => $this->input->post('inputHour'),
            'inputMinute' => $this->input->post('inputMinute')
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
                self::generate_page(validation_errors(), $formData['inputSpeed'], $formData['inputHour'], $formData['inputMinute']);
            }
        }
        else {
            $value_speed = $formData['inputSpeed'];
            $value_time =  $this->calculate->hour_to_minute($formData['inputHour'], $formData['inputMinute']);
            $result = round(($value_speed * $value_time) / 60, 1);;

            self::generate_page($result, $formData['inputSpeed'], $formData['inputHour'], $formData['inputMinute']);
        }
    }

    /**
     * @param $rtu
     * @param $is
     * @param $ih
     * @param $im
     */
    private function generate_page($rtu, $is, $ih, $im) {
        $data['frmName'] = 'dft';
        $data['frmInput'] = 'inputSpeed';

        $data['sUrl'] = 'http://' . $_SERVER['SERVER_NAME'];
        $data['title'] = $this->lang->line('Dst');
        $data['header'] = $this->lang->line('Distance');
        $data['estHeader'] = $this->lang->line('Est_distance');
        $data['language'] = $this->lang->line('language');
        $data['back'] = $this->lang->line('back');
        $data['speed'] = $this->lang->line('Speed');
        $data['time'] = $this->lang->line('Time');
        $data['knot'] = $this->lang->line('knot');
        $data['shortHour'] = $this->lang->line('short_hour');
        $data['shortMinute'] = $this->lang->line('short_minute');
        $data['calculate'] = $this->lang->line('Calculate');
        $data['shortNauticalMiles'] = $this->lang->line('short_nautical_miles');

        $data['ResponseToUser'] = '';
        $data['ValueSpeed'] = '';
        $data['ValueHour'] = '';
        $data['ValueMinute'] = '';
        /**
         * if missing information
         */
        if ($rtu == TRUE) {
            $data['ResponseToUser'] = $rtu;
            $data['ValueSpeed'] = $is;
            $data['ValueHour'] = $ih;
            $data['ValueMinute'] = $im;
        }

        $this->load->view('Distance_View',$data);
    }
}