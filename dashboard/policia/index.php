<?php 
	session_start();
	require '../../modules/config.php';

	if (isset($rol) && $rol == 'policia'):
		include '../../header.php';
		include '../../includes/policia_body_registro.php';
		include '../../footer.php';
	else:
		header('Location: /../../index.php'); 
	endif;
?>