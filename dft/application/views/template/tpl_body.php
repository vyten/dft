<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * tpl_body.php
 *
 * Body used an neutral pages
 *
 * @package  CodeIgniter Version 3.1.9
 * @author   Urban Bjorken <urban.bjorken@skalarit.se>
 * @version  1.0
 * @since    File available since V2.0
 */

echo <<<EOF
<body class="w3-dark-gray">
	<div class="w3-container w3-center w3-wide w3-card">
		<h2>$header</h2>
	</div>
EOF;
?>