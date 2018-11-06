<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * FirstTime_View.php
 *
 * Selection of calculation
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
	<div class="w3-container w3-margin w3-center" >
	    <p><a href="$sUrl/distance" class="w3-button w3-wide w3-block w3-blue-grey w3-hover-blue w3-round-large">$distance</a>
	    </p>
		<p>&nbsp;</p>
	    
	    <p><a href="$sUrl/speed" class="w3-button w3-wide w3-block w3-blue-grey w3-hover-blue w3-round-large">$speed</a>
	    </p>
		<p>&nbsp;</p>
	    
	    <p><a href="$sUrl/time" class="w3-button w3-wide w3-block w3-blue-grey w3-hover-blue w3-round-large">$time</a>
	    </p>
	</div>
</body>
</html>
EOF;
?>
