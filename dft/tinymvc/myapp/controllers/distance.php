<?php
/**
 * distance.php
 *
 * distance controller
 *
 * @package		TinyMVC
 * @author		Urban Björkén <vyten@munet.nu>
 */

class Distance_Controller extends TinyMVC_Controller {
	
	function index() {
		self::generate_page();
	}
	
	/**
	 * @return void
	 */
	private function generate_page() {
		$tpl_param['title'] = 'Distans F T';
		$tpl_param['header'] = 'Distans';
		$tpl_param['frmName'] = 'dft';
		$tpl_param['frmInput'] = 'inputSpeed';
		
		$tpl_header = $this->view->fetch('header_tpl',$tpl_param);
		$tpl_body = $this->view->fetch('body_frm_tpl',$tpl_param);
		$tpl_footer = $this->view->fetch('footer_tpl');
		
		$this->view->assign('tplHeader',$tpl_header);
		$this->view->assign('tplBody',$tpl_body);
		$this->view->assign('tplFooter',$tpl_footer);
		
		$this->view->display('distance_view');
	}
	
	
}
?>