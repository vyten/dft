<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Speed_View.php
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
if ($ResponseToUser == TRUE) {

    /**
     * answer
     */
    if (is_numeric($ResponseToUser)) {
//        echo "<div class='w3-panel w3-card-4 w3-blue w3-center'>";
        echo "<div class='w3-text-yellow w3-center'>";
        echo "<h2>$estHeader</h2>";
        echo "<h3>$ResponseToUser $knot</h3>";
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
    'name'      => 'inputHour',
    'value'     => $ValueHour,
    'maxlength' => '3',
    'size'      => '3'
);

$att_input_3 = array(
    'class'     => 'w3-border w3-round-large w3-gray',
    'name'      => 'inputMinute',
    'value'     => $ValueMinute,
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
echo form_open('speed/display', $att_form);
echo "<h3><b>$distance</b></h3>";
echo form_input($att_input_1) . $shortNauticalMiles;

echo "<h3><b>$time</b></h3>";
echo form_input($att_input_2) . $shortHour;
echo "&nbsp;&nbsp;&nbsp;";
echo form_input($att_input_3) . $shortMinute;

echo "<p>";
echo form_submit($att_submit);
echo form_close();

$this->load->view('template/tpl_footer',$data);