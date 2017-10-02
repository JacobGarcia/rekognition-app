<?php 
	session_start();

	$rol = $_SESSION['rol'];

	if (isset($rol) && $rol == 'organizador'):
		echo 'Hola Organizador';
	else:
		header('Location: /../../index.php'); 
	endif;
?>