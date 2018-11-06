<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * tpl_footer.php
 *
 * Body used an all pages
 *
 * @package  CodeIgniter Version 3.1.9
 * @author   Urban Bjorken <urban.bjorken@skalarit.se>
 * @version  1.0
 * @since    File available since V2.0
 */

echo <<<EOF
	<div class="w3-center">
		<p><a href="$sUrl" class="w3-button w3-wide w3-deep-orange w3-hover-blue w3-round-large">&laquo; $back</a></p>
		<p>
            <a href="$sUrl/language/se" class="w3-button"><img src="$sUrl/img/flag_nation_se.png" border="0" alt="Svenska" width="75%" height="75%"></a>
            &nbsp;
            <a href="$sUrl/language/en" class="w3-button"><img src="$sUrl/img/flag_nation_en.png" border="0" alt="English" width="75%" height="75%"></a>
            &nbsp;
            <a href="$sUrl/language/cz" class="w3-button"><img src="$sUrl/img/flag_nation_cz.png" border="0" alt="český" width="75%" height="75%"></a>
        </p>	
	</div>
</body>
</html>
EOF;
?>
