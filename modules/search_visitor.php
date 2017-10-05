<?php 
	session_start();
	require 'functions.php';
	header('Content-type: application/javascript');

	$user_pin = $_POST['pin'];
	$user_photo = $_POST['foto'];
	$user_token = $_SESSION['token'];

	$responseSearch = searchUser($user_pin, $user_photo, $user_token);

	print 'searchUser = {response:"'.$responseSearch['facial_validation'].'", message:"'.$responseSearch['message'].'"};';

	/*
	if ($responseSearch['facial_validation']):
		print 'searchUser = {response:'.$responseSearch['facial_validation'].'};';
	else:
		print 'searchUser = {response:'.$responseSearch['facial_validation'].', message:"'.$responseSearch['message'].'"};';
	endif;
	*/
?>