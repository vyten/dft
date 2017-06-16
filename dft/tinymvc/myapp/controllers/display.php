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
	private $inputPart = 'string';
	private $inputHeader = 'string';
	
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
		
		self::generate_page();
	}
	
	private function calculate_speed() {
		
		self::generate_page();
	}
	
	private function calculate_time() {
		
		self::generate_page();
	}
	
	
	private function generate_page() {
		$tpl_param['title'] = 'D F T';
		$tpl_param['header'] = $this->inputHeader;
		$tpl_param['sPath'] = $this->inputPart;
		
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