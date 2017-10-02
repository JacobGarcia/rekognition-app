<?php 
	session_start();
	require 'functions.php';
	header('Content-type: application/javascript');

	$user_pin = $_POST['pin'];
	$user_photo = $_POST['foto'];
	$user_token = $_SESSION['token'];

	$responseSearch = searchUser($user_pin, $user_photo, $user_token);

	if (isset($responseSearch['user'])):
		echo 'searchUser = {response:true};';
	else:
		echo 'searchUser = {response:false, message: "'.$responseSearch['message'].'"};';
	endif;
?>