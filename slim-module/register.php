<?php 
	header('Access-Control-Allow-Origin: *');
	header('Content-type: application/javascript');

	require 'config.php';
	require 'functions.php';

	$user_pin = $_POST['pin'];
	$user_site = $_POST['site'];

	$responseUser = registerUser($user_pin, $user_site, $token_hardcode);
	
	print 'registerUser = {response:"'.$responseUser['success'].'", message:"'.$responseUser['message'].'"};';

?>