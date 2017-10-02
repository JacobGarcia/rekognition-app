<?php 
	session_start();
	require 'functions.php';
	header('Content-type: application/javascript');

	$user_pin = $_POST['nombre'];
	$user_photo = $_POST['foto'];
	$user_token = $_SESSION['token'];

	$responseUser = searchUser($user_name, $user_privacy, $user_photo, $user_site, $user_token);

	echo 'registerUser = {response:'.$responseUser['success'].', pin:"'.$responseUser['user']['pin'].'"};';

?>