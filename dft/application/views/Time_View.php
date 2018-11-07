<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Time_View.php
 *
 * [description]
 *
 * @package  CodeIgniter Version 3.1.9
 * @author   Urban Bjorken <urban.bjorken@skalarit.se>
 * @version  1.0
 * @since    File available since V2.0
 */
$data ='';

$this->load->view('template/tpl_header',$data);
$this->load->view('template/tpl_body_frm',$data);

/**
 * if response to user
 */
if ($ResponseValue == TRUE) {

    /**
     * answer
     */
    if ($ResponseValue == 'success') {
//        echo "<div class='w3-panel w3-card-4 w3-blue w3-center'>";
        echo "<div class='w3-text-yellow w3-center'>";
        echo "<h2>$estHeader</h2>";
        echo "<h3>$ResponseToUser</h3>";
    }
    /**
     * wrong in input
     */
    else {
        echo "<div class='w3-panel w3-card-4 w3-yellow w3-center'>";
        echo "<h3>$ResponseToUser</h3>";
    }
    echo "</div>";
}

/**
 * formatting form
 */
$att_form = array(
    'class' => 'w3-container w3-wide w3-large',
    'name'  => 'dft'
);

$att_input_1 = array(
    'class'     => 'w3-border w3-round-large w3-gray',
    'name'      => 'inputDistance',
    'value'     => $ValueDistance,
    'maxlength' => '3',
    'size'      => '3'
);

$att_input_2 = array(
    'class'     => 'w3-border w3-round-large w3-gray',
    'name'      => 'inputSpeed',
    'value'     => $ValueSpeed,
    'maxlength' => '3',
    'size'      => '3'
);

$att_submit = array(
    'class' => 'w3-button w3-wide w3-green w3-hover-blue w3-round-large',
    'value' => $calculate
);

/**
 * form
 */
echo form_open('time/display', $att_form);
echo "<h3><b>$distance</b></h3>";
echo form_input($att_input_1) . $shortNauticalMiles;
echo "<h3><b>$speed</b></h3>";
echo form_input($att_input_2) . $knot;

echo "<p>";
echo form_submit($att_submit);
echo form_close();

$this->load->view('template/tpl_footer',$data);
