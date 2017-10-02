<?php 
	require '../../modules/config.php';

	session_start();
	$rol = $_SESSION['rol'];

	if (isset($rol) && $rol == 'registrador'):
		include '../../header.php';
		include '../../includes/registrador_body.php';
		include '../../footer.php';
	else:
		header('Location: ../../index.php'); 
	endif;
?>