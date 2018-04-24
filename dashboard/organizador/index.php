<?php 
	session_start();
	require '../../modules/config.php';

	if (isset($rol) && $rol == 'organizador'):
		include '../../header.php';
		include '../../includes/organizador_body_buscar.php';
		include '../../footer.php';
	else:
		header('Location: /../../index.php'); 
	endif;
?>