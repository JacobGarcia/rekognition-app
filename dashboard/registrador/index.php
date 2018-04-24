<?php 
	session_start();
	require '../../modules/config.php';

	if (isset($rol) && $rol == 'registrador'):
		include '../../header.php';
		include '../../includes/registrador_body.php';
		include '../../footer.php';
	else:
		header('Location: ../../index.php'); 
	endif;
?>