<?php 
echo $tplHeader;
echo $tplBody;
new_links();
new_foot();




function new_links() {
	echo <<<EOF
	<div class="w3-container w3-margin" >
		<p><a href="/distance" class="w3-button w3-wide w3-block w3-blue-grey w3-hover-blue w3-round-large">Distans</a></p>
		<p>&nbsp;</p>
		<p><a href="/speed" class="w3-button w3-wide w3-block w3-blue-grey w3-hover-blue w3-round-large">Fart</a></p>
		<p>&nbsp;</p>
		<p><a href="/time" class="w3-button w3-wide w3-block w3-blue-grey w3-hover-blue w3-round-large">Tid</a></p>
	</div>
EOF;
}
	
function new_foot () {
	echo <<<EOF
</body>
</html>
EOF;
}
?>