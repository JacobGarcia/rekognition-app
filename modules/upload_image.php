<?php
	//header('Acces-Control-Allow-Origin: http://192.168.1.100:8888/');
	//set random name for the image, used time() for uniqueness

	$filename =  time() . '.jpg';
	$filepath = '/nfs/c11/h07/mnt/202570/domains/iceberg9.com/html/playground/face-recognition/assets/snaps/';

	move_uploaded_file($_FILES['webcam']['tmp_name'], $filepath.$filename);

	//echo $filepath.$filename;
	echo 'http://iceberg9.com/playground/face-recognition/assets/snaps/'.$filename;
?>