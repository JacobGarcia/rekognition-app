<?php 
	session_start();
	require 'functions.php';
	header('Content-type: application/javascript');

	$user_pin = $_POST['pin'];
	$user_token = $_SESSION['token'];

	$responsePin = searchPin($user_pin, $user_token);

	if (isset($responsePin['user'])):
		echo 'searchPin = {response:true, name:"'.$responsePin['user']['name'].'", privacy:"'.$responsePin['user']['privacy'].'", photo:"'.$responsePin['user']['photo'].'", site:"'.$responsePin['user']['site'].'"};';
	else:
		echo 'searchPin = {response:false, message: "'.$responsePin['message'].'"};';
	endif;
?>