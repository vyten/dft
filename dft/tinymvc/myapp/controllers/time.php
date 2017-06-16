<?php
/**
 * time.php
 *
 * time controller
 *
 * @package		TinyMVC
 * @author		Urban Björkén <vyten@munet.nu>
 */

class Time_Controller extends TinyMVC_Controller {
	
	function index() {
		self::generate_page();
	}
	
	/**
	 * @return void
	 */
	private function generate_page() {
		$tpl_param['title'] = 'D F Tid';
		$tpl_param['header'] = 'Tid';
		
		$tpl_header = $this->view->fetch('header_tpl',$tpl_param);
		$tpl_body = $this->view->fetch('body_tpl',$tpl_param);
		$tpl_footer = $this->view->fetch('footer_tpl');
		
		$this->view->assign('tplHeader',$tpl_header);
		$this->view->assign('tplBody',$tpl_body);
		$this->view->assign('tplFooter',$tpl_footer);
		
		$this->view->display('time_view');
	}
}
?>