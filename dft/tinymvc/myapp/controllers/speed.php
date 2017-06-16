<?php
/**
 * speed.php
 *
 * speed controller
 *
 * @package		TinyMVC
 * @author		Urban Björkén <vyten@munet.nu>
 */

class Speed_Controller extends TinyMVC_Controller {
	
	function index() {
		self::generate_page();
	}
	
	/**
	 * @return void
	 */
	private function generate_page() {
		$tpl_param['title'] = 'D Fart T';
		$tpl_param['header'] = 'Fart';
		
		$tpl_header = $this->view->fetch('header_tpl',$tpl_param);
		$tpl_body = $this->view->fetch('body_tpl',$tpl_param);
		$tpl_footer = $this->view->fetch('footer_tpl');
		
		$this->view->assign('tplHeader',$tpl_header);
		$this->view->assign('tplBody',$tpl_body);
		$this->view->assign('tplFooter',$tpl_footer);
		
		$this->view->display('speed_view');
	}
}
?>