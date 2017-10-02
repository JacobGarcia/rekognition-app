<?php 
	session_start();
	require '../../modules/config.php';

	if (isset($rol) && $rol == 'organizador'):
		echo 'Hola Organizador';
	else:
		header('Location: /../../index.php'); 
	endif;
?>