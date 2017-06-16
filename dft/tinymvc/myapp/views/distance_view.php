<?php
echo $tplHeader;
echo $tplBody;
new_form();
echo $tplFooter;

function new_form() {
	echo <<<EOF
	<form name="dft" class="w3-container w3-wide w3-xlarge" action="display" method="post">
		<h3><b>Fart</b></h3>
		<input type="text" name="inputSpeed" class="w3-border w3-round-large w3-gray" size="3"></input>&nbsp;knop
		
		<h3><b>Tid</b></h3>
		<input type="text"  name="inputHour" class="w3-border w3-round-large w3-gray" size="3"></input>&nbsp;h&nbsp;&nbsp;&nbsp; 
		<input type="text" name="inputMinute" class="w3-border w3-round-large w3-gray" size="3"></input>&nbsp;m
		<br>
		<input type="hidden" name="inputPart" value="distance"></input>
		</br>
		<input type="submit" class="w3-button w3-wide w3-green w3-hover-blue w3-round-large" value="Räkna ut"></input>
	</form>
EOF;
}
?>