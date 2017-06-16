<?php
echo $tplHeader;
echo $tplBody;
new_form();
echo $tplFooter;

function new_form() {
	echo <<<EOF
	<form name="dft"  class="w3-container w3-wide w3-xlarge" action="display" method="post">
		<h3><b>Distans</b></h3>
		<input type="text" name="inputDistance" class="w3-border w3-round-large w3-gray" size="3"></input>&nbsp;M
		
		<h3><b>Fart</b></h3>
		<input type="text" name="inputSpeed" class="w3-border w3-round-large w3-gray" size="3"></input>&nbsp;knop
		<br>
		<input type="hidden" name="inputPart" value="time"></input>
		</br>
		<input type="submit" class="w3-button w3-wide w3-green w3-hover-blue w3-round-large" value="Räkna ut"></input>
	</form>
EOF;
}
?>