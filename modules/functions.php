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
		'photo' => $photo,
		'site' => $site
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
	//curl_setopt($session, CURLOPT_HTTPHEADER, array('Content-Type: application/x-www-form-urlencoded', 'x-access-token: eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJfaWQiOiI1OWQwODkzM2FiMjM4YTJhYWMzNjkyMmQiLCJpYXQiOjE1MDY4Mzg4NTIsImV4cCI6MTUwNzA1NDg1Mn0.28Ywt_cfO_F7QrVtbKJbD0d-3_SjljonvTTav2XkCzI'));
	curl_setopt($session, CURLOPT_HTTPHEADER, array('Content-Type: application/x-www-form-urlencoded', 'x-access-token: eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJfaWQiOiI1OWQwODkzM2FiMjM4YTJhYWMzNjkyMmQiLCJpYXQiOjE1MDY4Mzg4NTIsImV4cCI6MTUwNzA1NDg1Mn0.28Ywt_cfO_F7QrVtbKJbD0d-3_SjljonvTTav2XkCzI'));
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
	$putUrl = 'http://ec2-13-59-176-172.us-east-2.compute.amazonaws.com/v1/users/update';
	$session = curl_init();
	curl_setopt($session, CURLOPT_URL, $putUrl);
	curl_setopt($session, CURLOPT_CONNECTTIMEOUT, 30);
	curl_setopt($session, CURLOPT_TIMEOUT, 30);
	curl_setopt($session, CURLOPT_HEADER, false);
	curl_setopt($session, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($session, CURLOPT_CUSTOMREQUEST, 'PUT');
	//curl_setopt($session, CURLOPT_POST, true);
	//curl_setopt($session, CURLOPT_HTTPHEADER, array('Content-Type: application/x-www-form-urlencoded', 'x-access-token: eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJfaWQiOiI1OWQwODkzM2FiMjM4YTJhYWMzNjkyMmQiLCJpYXQiOjE1MDY4Mzg4NTIsImV4cCI6MTUwNzA1NDg1Mn0.28Ywt_cfO_F7QrVtbKJbD0d-3_SjljonvTTav2XkCzI'));
	curl_setopt($session, CURLOPT_HTTPHEADER, array('Content-Type: application/x-www-form-urlencoded', 'x-access-token: '.$token.''));
	curl_setopt($session, CURLOPT_POSTFIELDS, $payload);

	$data = curl_exec($session);
	curl_close($session);
	$response = json_decode($data, true);

	return $response;
}



?>