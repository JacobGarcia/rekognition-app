<?php 

/* Login para usuarios =======================================*/
/* ===========================================================*/
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

?>