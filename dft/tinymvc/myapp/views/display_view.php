<?php 
echo $tplHeader;
echo $tplBody;
new_numeric_input($sErrorNumericInput);
new_missing_input($sErrorMissingInput);
new_result($sOutResult);
new_return($sPath);
echo $tplFooter;


function new_return($sPart) {
	echo <<<EOF
	<div class="w3-container w3-margin w3-center">
		<a href="$sPart" class="w3-button w3-wide w3-green w3-hover-blue w3-round-large">Ny beräkning</a></p>
	</div>
EOF;
}
	
function new_missing_input($sErrorMissingInput) {
	if (strlen($sErrorMissingInput) == 32) {
		echo <<<EOF
		<div class="w3-card-4 w3-yellow w3-center">
			<h3>$sErrorMissingInput</h3>
		</div> 
EOF;
	} 
}

function new_numeric_input($sErrorNumericInput) {
	if (strlen($sErrorNumericInput) == 28) {
		echo <<<EOF
		<div class="w3-card-4 yellow w3-center">
			<h3 class="w3-yellow ">$sErrorNumericInput</h3>
		</div>
EOF;
	}
}

function new_result($sOutResult) {
	if (strlen($sOutResult) > 1) {
		echo <<<EOF
		<div class="w3-text-yellow w3-center">	
			<h2>$sOutResult</h2>
		</div>
EOF;
	}
}


?>