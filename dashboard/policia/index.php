<?php 
	session_start();

	$rol = $_SESSION['rol'];

	if (isset($rol) && $rol == 'policia'):
		echo 'Hola Policia';
	else:
		header('Location: /../../index.php'); 
	endif;
?>