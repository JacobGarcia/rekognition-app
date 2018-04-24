<?php
	$responseSites = getSites($token_hardcode);

	print '<select name="site" id="site">';
	print '<option value="blank">-- Escoge un sitio</option>';
	foreach($responseSites['sites'] as $sites) {
		print '<option value="'.$sites['key'].'">'.$sites['name'].' -- '.$sites['key'].'</option>';
	}
	print '</select>';
?>
