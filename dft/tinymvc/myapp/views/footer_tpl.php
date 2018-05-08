<?php
$sUrl = 'http://' . $_SERVER['SERVER_NAME'];

echo <<<EOF
	<div class="w3-container w3-margin w3-center">
		<p><a href="$sUrl" class="w3-button w3-wide w3-deep-orange w3-hover-blue w3-round-large">&laquo; Tillbaka</a></p>
        <!-- p><img src="$sUrl/img/$imgFormula"></p -->
	</div>
</body>
</html>
EOF;
?>