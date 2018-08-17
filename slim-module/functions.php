<?php
/* Autogenerar PIN alfanumerico ==================================================*/
/* ===============================================================================*/
function generateRandomPin($length) {
	$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
	$charactersLength = strlen($characters);
	$randomPin = '';
	for ($i = 0; $i < $length; $i++) {
		$randomPin .= $characters[rand(0, $charactersLength - 1)];
	}
	return $randomPin;
}

/* Obtenemos Lugares ===============================================================*/
/* =================================================================================*/
function getSites($token) {

	$putUrl = 'https://demo.connus.mx/v1/sites/list';
	$session = curl_init();
	curl_setopt($session, CURLOPT_URL, $putUrl);
	curl_setopt($session, CURLOPT_CONNECTTIMEOUT, 30);
	curl_setopt($session, CURLOPT_TIMEOUT, 30);
	curl_setopt($session, CURLOPT_HEADER, false);
	curl_setopt($session, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($session, CURLOPT_CUSTOMREQUEST, 'GET');
	curl_setopt($session, CURLOPT_HTTPHEADER, array('Content-Type: application/x-www-form-urlencoded', 'Authorization: Bearer '.$token.''));

	$data = curl_exec($session);
	curl_close($session);
	$response = json_decode($data, true);

	return $response;
}

/* Registro de usuarios ============================================================*/
/* =================================================================================*/
function registerUser($pin, $site, $token) {
	$payload = array(
		'pin' => $pin,
		'site' => $site,
		'privacy' => 'true'
	);

	$payload = http_build_query($payload);
	$putUrl = 'https://demo.connus.mx/v1/users/signup';
	$session = curl_init();
	curl_setopt($session, CURLOPT_URL, $putUrl);
	curl_setopt($session, CURLOPT_CONNECTTIMEOUT, 30);
	curl_setopt($session, CURLOPT_TIMEOUT, 30);
	curl_setopt($session, CURLOPT_HEADER, false);
	curl_setopt($session, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($session, CURLOPT_POST, true);
	curl_setopt($session, CURLOPT_HTTPHEADER, array('Content-Type: application/x-www-form-urlencoded', 'Authorization: Bearer '.$token.''));
	curl_setopt($session, CURLOPT_POSTFIELDS, $payload);

	$data = curl_exec($session);
	curl_close($session);
	$response = json_decode($data, true);

	return $response;
}

/* Login para usuarios (Authenticate User) =======================================*/
/* ===============================================================================*/
function loginUser($pin, $site, $token) {
	$payload = array(
		'pin' => $pin,
		'site' => $site
	);

	$payload = http_build_query($payload);
	$putUrl = 'https://demo.connus.mx/v1/users/login';
	$session = curl_init();
	curl_setopt($session, CURLOPT_URL, $putUrl);
	curl_setopt($session, CURLOPT_CONNECTTIMEOUT, 30);
	curl_setopt($session, CURLOPT_TIMEOUT, 30);
	curl_setopt($session, CURLOPT_HEADER, false);
	curl_setopt($session, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($session, CURLOPT_POST, true);
	curl_setopt($session, CURLOPT_HTTPHEADER, array('Content-Type: application/x-www-form-urlencoded', 'Authorization: Bearer '.$token.''));
	curl_setopt($session, CURLOPT_POSTFIELDS, $payload);

	$data = curl_exec($session);
	curl_close($session);
	$response = json_decode($data, true);

	return $response;
}

function logoutUser($pin, $site, $token) {
	$payload = array(
		'pin' => $pin,
		'site' => $site
	);

	$payload = http_build_query($payload);
	$putUrl = 'https://demo.connus.mx/v1/users/logout';
	$session = curl_init();
	curl_setopt($session, CURLOPT_URL, $putUrl);
	curl_setopt($session, CURLOPT_CONNECTTIMEOUT, 30);
	curl_setopt($session, CURLOPT_TIMEOUT, 30);
	curl_setopt($session, CURLOPT_HEADER, false);
	curl_setopt($session, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($session, CURLOPT_POST, true);
	curl_setopt($session, CURLOPT_HTTPHEADER, array('Content-Type: application/x-www-form-urlencoded', 'Authorization: Bearer '.$token.''));
	curl_setopt($session, CURLOPT_POSTFIELDS, $payload);

	$data = curl_exec($session);
	curl_close($session);
	$response = json_decode($data, true);

	return $response;
}

function debug_to_console( $data ) {
    $output = $data;
    if ( is_array( $output ) )
        $output = implode( ',', $output);

    echo "<script>console.log( 'Debug Objects: " . $output . "' );</script>";
}

function openCity($evt, $tab) {
    echo 'I just ran a php function';
  }
?>
