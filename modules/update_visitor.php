<?php 
	session_start();
	require 'functions.php';
	header('Content-type: application/javascript');

	$user_pin = $_POST['pin'];
	$user_site = $_POST['sitio'];
	$user_time = $_POST['fecha'];
	$user_token = $_SESSION['token'];

	$responseUpdate = updateVisitor($user_pin, $user_site, $user_time, $user_token);

	if (isset($responseUpdate['user'])):
		echo 'updateVisitor = {response:true, message:"Visitante actualizado correctamente."};';
	else:
		echo 'updateVisitor = {response:false, message: "'.$responseUpdate['message'].'"};';
	endif;
?>