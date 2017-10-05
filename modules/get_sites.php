<?php 
	session_start();
	require 'functions.php';

	$user_token = $_SESSION['token'];

	$responseSites = getSites($user_token);

	print '<select>';
	foreach($responseSites['sites'] as $sites) {
		print '<option>'.$sites['name'].'</option>';
	}
	print '</select>';
?>