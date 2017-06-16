<?php 
echo $tplHeader;
echo $tplBody;
new_return($sPath);
echo $tplFooter;


function new_return($sPart) {
	echo <<<EOF
	<div class="w3-container w3-margin w3-center">
		<a href="$sPart" class="w3-button w3-wide w3-green w3-hover-blue w3-round-large">Ny beräkning</a></p>
	</div>
EOF;
}
?>