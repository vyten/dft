<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Flag_View.php
 *
 * Selection of language
 *
 * @package  CodeIgniter Version 3.1.9
 * @author   Urban Bjorken <urban.bjorken@skalarit.se>
 * @version  1.0
 * @since    File available since V2.0
 */
$data['sUrl'] = $sUrl;
$data['title'] = $title;
$data['header'] = $header;

$this->load->view('template/tpl_header',$data);
$this->load->view('template/tpl_body',$data);

echo <<<EOF
	<div class="w3-container w3-margin w3-center">
	    <p><a href="$sUrl/language/se" class="w3-button w3-blue-grey w3-hover-blue w3-round-large">
	        <img src="$sUrl/img/flag_nation_se.png" border="0" alt="Svenska">
	    </a></p>
		<p>&nbsp;</p>
	    
	    <p><a href="$sUrl/language/en" class="w3-button w3-blue-grey w3-hover-blue w3-round-large">
	        <img src="$sUrl/img/flag_nation_en.png" border="0" alt="English">
	    </a></p>
		<p>&nbsp;</p>
	    
	    <p><a href="$sUrl/language/cz" class="w3-button w3-blue-grey w3-hover-blue w3-round-large">
	        <img src="$sUrl/img/flag_nation_cz.png" border="0" alt="český">
	    </a></p>
	</div>
</body>
</html>
EOF;
?>