<?php
/**
 * display.php
 *
 * calculate and display controller
 *
 * @package		TinyMVC
 * @author		Urban Björkén <vyten@munet.nu>
 */

class Display_Controller extends TinyMVC_Controller {
	private $inputPart = '';
	private $inputValue = array();
	private $inputHeader = '';
	private $outResult = '';
	private $errorMissingInput  = '';
	private $errorNumericInput  = '';
	
	/**
	 * 
	 * {@inheritDoc}
	 * @see TinyMVC_Controller::index()
	 */
	function index() {
		/** if no $_POST */
		if (empty($_POST['inputPart'])) {
			funcVoidRedirectBasic('/');
			return;
		}
		
		$this->inputPart = funcGetSanitizedValue($_POST['inputPart']);
		switch ($this->inputPart) {
			case 'distance':
				$this->inputHeader = 'Uträknad distans';
				self::calculate_distance();
				break;
				
			case 'speed':
				$this->inputHeader = 'Uträknad fart';
				self::calculate_speed();
				break;
				
			case 'time':
				$this->inputHeader = 'Uträknad tid';
				self::calculate_time();
				break;
				
			default:
				funcVoidRedirectBasic('/');
		}	
	}
	
	private function calculate_distance() {   
		if (strlen($_POST['inputSpeed']) == 0|| strlen($_POST['inputHour']) == 0|| strlen($_POST['inputMinute']) == 0) {
			self::error_missing_input();
			self::generate_page();
			return;
		}
		
		$this->inputValue = array(funcGetSanitizedValue($_POST['inputSpeed']), funcGetSanitizedValue($_POST['inputHour']), funcGetSanitizedValue($_POST['inputMinute']));
		foreach ($this->inputValue as $element) {
			if (!is_numeric($element)) {
				self::error_numeric_input();
				self::generate_page();
				return;
			}
		}
		$value_speed = funcGetSanitizedValue($_POST['inputSpeed']);
		$value_time = funcHourToMinute(funcGetSanitizedValue($_POST['inputHour']), funcGetSanitizedValue($_POST['inputMinute']));
		
		$result = round(($value_speed * $value_time) / 60, 1);
		$this->outResult = $result . ' M';
		self::generate_page();
	}
	
	private function calculate_speed() {
		if (strlen($_POST['inputDistance']) == 0|| strlen($_POST['inputHour']) == 0|| strlen($_POST['inputMinute']) == 0) {
			self::error_missing_input();
			self::generate_page();
			return;
		}
		$this->inputValue = array(funcGetSanitizedValue($_POST['inputDistance']), funcGetSanitizedValue($_POST['inputHour']), funcGetSanitizedValue($_POST['inputMinute']));
		foreach ($this->inputValue as $element) {
			if (!is_numeric($element)) {
				self::error_numeric_input();
				self::generate_page();
				return;
			}
		}
		$value_distance = funcGetSanitizedValue($_POST['inputDistance']);
		$value_time = funcHourToMinute(funcGetSanitizedValue($_POST['inputHour']), funcGetSanitizedValue($_POST['inputMinute']));
		
		$result = round(($value_distance / $value_time) * 60, 1);
		$this->outResult = $result . ' knop';
		self::generate_page();
	}
	
	private function calculate_time() {
		if (strlen($_POST['inputDistance']) == 0 || strlen($_POST['inputSpeed']) == 0) {
			self::error_missing_input();
			self::generate_page();
			return;
		}
		
		$this->inputValue = array(funcGetSanitizedValue($_POST['inputDistance']), funcGetSanitizedValue($_POST['inputSpeed']));
		foreach ($this->inputValue as $element) {
			if (!is_numeric($element)) {
				self::error_numeric_input();
				self::generate_page();
				return;
			}
		}
		$value_distance = funcGetSanitizedValue($_POST['inputDistance']);
		$value_speed = funcGetSanitizedValue($_POST['inputSpeed']);
		
		$result = funcminuteToHour(round(($value_distance / $value_speed) * 60,0));
		$this->outResult = $result;
		self::generate_page();
	}
	
	/**
	 * 
	 * @return string
	 */
	private function error_missing_input() {
		return $this->errorMissingInput = 'OOPS!<br>Missade visst en siffra';
	}
	
	/**
	 *
	 * @return string
	 */
	private function error_numeric_input() {
		return $this->errorNumericInput = 'OOPS!<br>endast siffror tack';
	}
	
	
	
	
	/**
	 * @return void
	 */
	private function generate_page() {
		$tpl_param['title'] = 'D F T';
		$tpl_param['header'] = $this->inputHeader;
		$tpl_param['sPath'] = $this->inputPart;
		$tpl_param['sErrorMissingInput'] = $this->errorMissingInput;
		$tpl_param['sErrorNumericInput'] = $this->errorNumericInput;
		$tpl_param['sOutResult'] = $this->outResult;
		$tpl_header = $this->view->fetch('header_tpl',$tpl_param);
		$tpl_body = $this->view->fetch('body_tpl',$tpl_param);
		$tpl_footer = $this->view->fetch('footer_tpl');
		
		$this->view->assign('tplHeader',$tpl_header);
		$this->view->assign('tplBody',$tpl_body);
		$this->view->assign('tplFooter',$tpl_footer);
		
		$this->view->display('display_view',$tpl_param);
	}
}
?>