$(function() {

	$('#send-login').click(function() {

		//console.log('Login Click!');

		$.ajax({
			//url: 'http://app01.doctype.com.mx/modules/login.php',
			url: 'http://localhost:8888/face-recognition/modules/login.php',
			type: 'POST',
			data: {
				usuario: $('#usuario').val(),
				password: $('#password').val()
			},
			beforeSend: function () {
				$(this).html('Procesando, espere por favor...');
				//console.log('beforeSend ok!');
			},
			success: function (response) {
				//console.log(loginUser.login);
				if (loginUser.login) {
					console.log('Entras a: ' + loginUser.url);
				} else {
					console.log('Error: ' + loginUser.message);
					$('#login-message').fadeIn();
					$('#login-message').html(loginUser.message);
				}
			}
		});


	});

	// Webcam JS
	
	Webcam.attach('#my_camera');
	
	function take_snapshot() {
		Webcam.snap( function(data_uri) {
			document.getElementById('my_result').innerHTML = '<img src="'+data_uri+'"/>';
		} );
	}
	

});