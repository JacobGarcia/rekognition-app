<?php 
	session_start();
	require 'functions.php';
	header('Content-type: application/javascript');

	$login_user = $_POST['usuario'];
	$login_pswd = $_POST['password'];

	$authenticatelUser = loginUser($login_user, $login_pswd);

	if (isset($authenticatelUser['user']['role'])):
		$_SESSION['rol'] = $authenticatelUser['user']['role'];
		$_SESSION['token'] = $authenticatelUser['token'];
	endif;

	if (isset($authenticatelUser['user']['role']) && $authenticatelUser['user']['role'] == 'registrador'):
		
		echo 'loginUser = {login:true, url:"dashboard/registrador/"};';

	elseif (isset($authenticatelUser['user']['role']) && $authenticatelUser['user']['role'] == 'organizador'):

		echo 'loginUser = {login:true, url:"dashboard/organizador/"};';

	elseif (isset($authenticatelUser['user']['role']) && $authenticatelUser['user']['role'] == 'policia'):

		echo 'loginUser = {login:true, url:"dashboard/policia/"};';

	else:

		echo 'loginUser = {login:false, message:"'.$authenticatelUser["message"].'"};';

	endif;

?>