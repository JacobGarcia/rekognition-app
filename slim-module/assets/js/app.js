// *********** Socket.io *********** //
// ********************************* //
var socket = io('https://connus.be');
socket.on('connect', () => {
	socket.emit('join', 'connus');
})

socket.on('photo', (data) => {
	console.log(data);
	$('#output-image').html('<div><p>Proceso completado</p></div><div><img src="' + data['photo'] + '"></div>');
});


// *********** AJAX Register/Login *********** //
// ******************************************* //

$(function() {

	// Registro de usuario con validaciones de campos
	$('#register-user').click(function() {
		var v_data = 0;

		$('#output-message').html('');

		if ($('#site').val() != 'blank') {
			v_data++;
		} else {
			$('#output-message').html('<span class="form__error">Necesitas seleccionar un Sitio.</span>');
		}

		if (v_data == 1) {
			$.ajax({
				url: 'https://iceberg9.com/playground/face-id/slim-module/register.php',
				type: 'POST',
				data: {
					pin: $('#pin').val(),
					site: $('#site').val()
				},
				beforeSend: function () {
					$('#send-register').html('Procesando, espere por favor...');
					$('#send-register').attr('disabled', 'disabled');
				},
				success: function (response) {
					$('#send-register').html('Registrar usuario');
					$('#send-register').removeAttr('disabled');
					if (registerUser.response) {
						$('#output-message').html('<span class="form__error form--succes">' + registerUser.message + '</span>');
						$('#output-image').fadeIn();
					} else {
						$('#output-message').html('<span class="form__error">' + registerUser.message + '</span>');
					}
				} 
			});
		} else {
			$('#output-message').html('<span class="form__error">Necesitas llenar todos los campos.</span>');
		}

	});


	// Login de usuario con validaciones de campos
	$('#login-user').click(function() {
		var v_data = 0;

		$('#output-message').html('');

		if ($('#site').val() != 'blank') {
			v_data++;
		}  else {
			$('#output-message').html('<span class="form__error">Necesitas seleccionar un Sitio.</span>');
		}

		if ($('#pin').val() != '') {
			v_data++;
		} else {
			$('#output-message').html('<span class="form__error">Necesitas ingresar un PIN válido.</span>');
		}

		if (v_data == 2) {
			$.ajax({
				url: 'https://iceberg9.com/playground/face-id/slim-module/login.php',
				type: 'POST',
				data: {
					pin: $('#pin').val(),
					site: $('#site').val()
				},
				beforeSend: function () {
					$('#login-user').html('Procesando, espere por favor...');
					$('#login-user').attr('disabled', 'disabled');
				},
				success: function (response) {
					$('#login-user').html('Validar usuario');
					$('#login-user').removeAttr('disabled');
					if (loginUser.response) {
						$('#output-message').html('<span class="form__error form--succes">' + loginUser.message + '</span>');
						$('#output-image').fadeIn();
					} else {
						$('#output-message').html('<span class="form__error">' + loginUser.message + '</span>');
					}
				} 
			});
		} else {
			$('#output-message').html('<span class="form__error">Necesitas llenar todos los campos.</span>');
		}

	});


});