<?php 
	session_start();
	require 'functions.php';
	header('Content-type: application/javascript');

	$user_name = $_POST['nombre'];
	$user_site = $_POST['sitio'];
	$user_privacy = $_POST['privacidad'];
	$user_photo = $_POST['foto'];
	$user_token = $_SESSION['token'];

	$responseUser = registerUser($user_name, $user_privacy, $user_photo, $user_site, $user_token);
	

	if (isset($responseUser['user'])):
		print 'registerUser = {response:'.$responseUser['success'].', pin:"'.$responseUser['user']['pin'].'"};';
	else:
		print 'registerUser = {response:'.$responseUser['success'].', message:"'.$responseUser['message'].'"};';
	endif;

?>