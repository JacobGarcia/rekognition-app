<?php 
	session_start();
	require '../../modules/functions.php';

	$user_token = $_SESSION['token'];

	$responseSites = getSites($user_token);
	
	print '<select id="sitio" class="form__select" name="sitio>';
	print '<option value="blank">Selecciona un sitio</option>';
	foreach($responseSites['sites'] as $sites) {
		print '<option value="'.$sites['_id'].'">'.$sites['name'].' - '.$sites['location'].'</option>';
	}
	print '</select>';
?>