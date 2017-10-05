<?php 

/* Login para usuarios (Authenticate User) =======================================*/
/* ===============================================================================*/
function loginUser($user, $pswd) {
	$payload = array(
		'user' => $user,
		'password' => $pswd
	);

	$payload = http_build_query($payload);
	$putUrl = 'http://ec2-13-59-176-172.us-east-2.compute.amazonaws.com/v1/admins/authenticate';
	$session = curl_init();
	curl_setopt($session, CURLOPT_URL, $putUrl);
	curl_setopt($session, CURLOPT_CONNECTTIMEOUT, 30);
	curl_setopt($session, CURLOPT_TIMEOUT, 30);
	curl_setopt($session, CURLOPT_HEADER, false);
	curl_setopt($session, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($session, CURLOPT_POST, true);
	curl_setopt($session, CURLOPT_HTTPHEADER, array('Content-Type: application/x-www-form-urlencoded'));
	curl_setopt($session, CURLOPT_POSTFIELDS, $payload);

	$data = curl_exec($session);
	curl_close($session);
	$response = json_decode($data, true);

	return $response;
}

/* Registro de visitante (Regiter user form) =======================================*/
/* =================================================================================*/
function registerUser($name, $privacy, $photo, $site, $token) {

	$payload = array(
		'name' => $name,
		'privacy' => $privacy,
		'site' => $site,
		'photo' => $photo
	);

	$payload = http_build_query($payload);
	$putUrl = 'http://ec2-13-59-176-172.us-east-2.compute.amazonaws.com/v1/users/register';
	$session = curl_init();
	curl_setopt($session, CURLOPT_URL, $putUrl);
	curl_setopt($session, CURLOPT_CONNECTTIMEOUT, 30);
	curl_setopt($session, CURLOPT_TIMEOUT, 30);
	curl_setopt($session, CURLOPT_HEADER, false);
	curl_setopt($session, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($session, CURLOPT_POST, true);
	curl_setopt($session, CURLOPT_HTTPHEADER, array('Content-Type: application/x-www-form-urlencoded', 'x-access-token: '.$token.''));
	curl_setopt($session, CURLOPT_POSTFIELDS, $payload);

	$data = curl_exec($session);
	curl_close($session);
	$response = json_decode($data, true);

	return $response;
}

/* Buscamos al visitante (Facial recognition) =======================================*/
/* =================================================================================*/
function searchUser($pin, $photo, $token) {
	$payload = array(
		'pin' => $pin,
		'photo' => $photo
	);

	$payload = http_build_query($payload);
	$putUrl = 'http://ec2-13-59-176-172.us-east-2.compute.amazonaws.com/v1/users/recognize';
	$session = curl_init();
	curl_setopt($session, CURLOPT_URL, $putUrl);
	curl_setopt($session, CURLOPT_CONNECTTIMEOUT, 30);
	curl_setopt($session, CURLOPT_TIMEOUT, 30);
	curl_setopt($session, CURLOPT_HEADER, false);
	curl_setopt($session, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($session, CURLOPT_CUSTOMREQUEST, 'POST');
	curl_setopt($session, CURLOPT_HTTPHEADER, array('Content-Type: application/x-www-form-urlencoded', 'x-access-token: '.$token.''));
	curl_setopt($session, CURLOPT_POSTFIELDS, $payload);

	$data = curl_exec($session);
	curl_close($session);
	$response = json_decode($data, true);

	return $response;
}

/* Buscamos el PIN (Search User) ===================================================*/
/* =================================================================================*/
function searchPin($pin, $token) {

	$putUrl = 'http://ec2-13-59-176-172.us-east-2.compute.amazonaws.com/v1/users/search/'.$pin;
	$session = curl_init();
	curl_setopt($session, CURLOPT_URL, $putUrl);
	curl_setopt($session, CURLOPT_CONNECTTIMEOUT, 30);
	curl_setopt($session, CURLOPT_TIMEOUT, 30);
	curl_setopt($session, CURLOPT_HEADER, false);
	curl_setopt($session, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($session, CURLOPT_CUSTOMREQUEST, 'GET');
	curl_setopt($session, CURLOPT_HTTPHEADER, array('Content-Type: application/x-www-form-urlencoded', 'x-access-token: '.$token.''));
	//curl_setopt($session, CURLOPT_POSTFIELDS, $payload);

	$data = curl_exec($session);
	curl_close($session);
	$response = json_decode($data, true);

	return $response;
}

/* Actualizar registro (Update User Form) ===================================================*/
/* ==========================================================================================*/
function updateVisitor($pin, $site, $date, $token) {

	date_default_timezone_set('America/Mexico_City');
	$time = new DateTime($date);
	$stamp = date_timestamp_get($time);

	$payload = array(
		'pin' => $pin,
		'site' => $site,
		'timestamp' => $stamp
	);

	$payload = http_build_query($payload);
	$putUrl = 'http://ec2-13-59-176-172.us-east-2.compute.amazonaws.com/v1/users/update';
	$session = curl_init();
	curl_setopt($session, CURLOPT_URL, $putUrl);
	curl_setopt($session, CURLOPT_CONNECTTIMEOUT, 30);
	curl_setopt($session, CURLOPT_TIMEOUT, 30);
	curl_setopt($session, CURLOPT_HEADER, false);
	curl_setopt($session, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($session, CURLOPT_CUSTOMREQUEST, 'PUT');
	curl_setopt($session, CURLOPT_HTTPHEADER, array('Content-Type: application/x-www-form-urlencoded', 'x-access-token: '.$token.''));
	curl_setopt($session, CURLOPT_POSTFIELDS, $payload);

	$data = curl_exec($session);
	curl_close($session);
	$response = json_decode($data, true);

	return $response;
}

/* Obtenemos Lugares (Get sited) ===================================================*/
/* =================================================================================*/
function getSites($token) {

	$putUrl = 'http://ec2-13-59-176-172.us-east-2.compute.amazonaws.com/v1/sites/list';
	$session = curl_init();
	curl_setopt($session, CURLOPT_URL, $putUrl);
	curl_setopt($session, CURLOPT_CONNECTTIMEOUT, 30);
	curl_setopt($session, CURLOPT_TIMEOUT, 30);
	curl_setopt($session, CURLOPT_HEADER, false);
	curl_setopt($session, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($session, CURLOPT_CUSTOMREQUEST, 'GET');
	curl_setopt($session, CURLOPT_HTTPHEADER, array('Content-Type: application/x-www-form-urlencoded', 'x-access-token: '.$token.''));

	$data = curl_exec($session);
	curl_close($session);
	$response = json_decode($data, true);

	return $response;
}

?>