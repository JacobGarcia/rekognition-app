$(function() {

	
	// Función para login -- Hacemos el redirect al dashboar segun el rol de canela
	$('#send-login').click(function() {
		$.ajax({
			//url: 'http://app01.doctype.com.mx/modules/login.php',
			url: 'https://iceberg9.com/playground/face-recognition/modules/login.php',
			type: 'POST',
			data: {
				usuario: $('#usuario').val(),
				password: $('#password').val()
			},
			beforeSend: function () {
				$(this).html('Procesando, espere por favor...');
				$(this).attr('disabled', 'disabled');
			},
			success: function (response) {
				if (loginUser.login) {
					//console.log('Entras a: ' + loginUser.url);
					window.location.href = loginUser.url;
				} else {
					//console.log('Error: ' + loginUser.message);
					$('#error-message').fadeIn();
					$('#error-message').prepend('<span class="form__error">' + loginUser.message + '</span>');
				}
			}
		});
	});

	// Registro de usuario con validaciones de campos
	$('#send-register').click(function() {
		var v_data = 0;

		$('#error-message').html('');

		if ($('#nombre').val() != '') {
			v_data++;
		} else {
			$('#error-message').prepend('<span class="form__error">Necesitas ingresar un Nombre.</span>');
		}

		if ($('#sitio').val() != 'blank') {
			v_data++;
		} else {
			$('#error-message').prepend('<span class="form__error">Necesitas seleccionar un Sitio.</span>');
		}

		if ($('#privacidad').is(':checked')) {
			v_data++;
		} else {
			$('#error-message').prepend('<span class="form__error">Necesitas aceptar el Aviso de Privacidad.</span>');
		}
		
		if ($('#foto').val() != '' ) {
			v_data++;
		} else {
			$('#error-message').prepend('<span class="form__error">Necesitas capturar una Fotografía.</span>');
		}

		if (v_data == 4) {
			$.ajax({
				url: 'https://iceberg9.com/playground/face-recognition/modules/register_user.php',
				type: 'POST',
				data: {
					nombre: $('#nombre').val(),
					sitio: $('#sitio').val(),
					privacidad: $('#privacidad').val(),
					foto: $('#foto').val()
				},
				beforeSend: function () {
					$(this).html('Procesando, espere por favor...');
					$(this).attr('disabled', 'disabled');
				},
				success: function (response) {
					console.log(response);
					//console.log(loginUser.login);
					if (registerUser.response) {
						//console.log('Registro exitoso: ' + registerUser.pin);
						$('#modal-registrador').fadeIn();
						$('#modal-registrador .registrador__pin').html('PIN: ' + registerUser.pin + '')
					} else {
						console.log('Error: ' + registerUser.response);
						$('#error-message').html('');
						$('#error-message').fadeIn();
						$('#error-message').html('<span class="form__error">' + registerUser.response + '</span>');
					}
				} 
			});
		} else {
			$('#error-message').fadeIn();
		}

	});


	// Buscamos al visitante
	$('#search-visitor').click(function() {
		var v_data = 0;

		$('#error-message').html('');

		if ($('#pin').val() != '') {
			v_data++;
		} else {
			$('#error-message').prepend('<span class="form__error">Necesitas ingresar el PIN del visitante.</span>');
		}
		
		if ($('#foto').val() != '' ) {
			v_data++;
		} else {
			$('#error-message').prepend('<span class="form__error">Necesitas capturar una Fotografía.</span>');
		}

		if (v_data == 2) {
			$.ajax({
				url: 'https://iceberg9.com/playground/face-recognition/modules/search_visitor.php',
				type: 'POST',
				data: {
					pin: $('#pin').val(),
					foto: $('#foto').val()
				},
				beforeSend: function () {
					$(this).html('Procesando, espere por favor...');
					$(this).attr('disabled', 'disabled');
				},
				success: function (response) {
					//console.log(response);
					console.log(searchUser);
					if (searchUser.response) {
						$('#modal-policia').fadeIn();
						$('#modal-policia .modal__title').html('Visitante verificado');
						$('#modal-policia .registrador__pin').html('Permitir Acceso');
					} else {
						$('#error-message').html('');
						$('#error-message').fadeIn();
						$('#error-message').html('<span class="form__error">' + searchUser.message + '</span>');
					}
				} 
			});
		} else {
			$('#error-message').fadeIn();
		}

	});


	// Cerrar modales | Universal
	$('.modal__close').click(function() {
		var chooseModal = $(this).attr('data-modal');
		$('#' + chooseModal).hide();
	});

	
	// Webcam JS | Primero verificamos que el DIV contenedor de camera exista y luego inicializamos el Script
	if ($('#my_camera').length) {
		Webcam.set({
			width: 240,
			height: 160,
			dest_width: 240,
			dest_height: 140,
			image_format: 'jpg',
			jpeg_quality: 90,
		});
		
		Webcam.attach('#my_camera');
		
		//function take_snapshot() {
		$('#take-snap').click(function() {

			Webcam.snap( function(data_uri) {
				// Mostramos la fotografía en el DOM
				$('#image-output').html('<img src="'+data_uri+'"/>');

				Webcam.on('uploadProgress', function(progress) {
					// Upload in progress
					// 'progress' will be between 0.0 and 1.0
					//console.log(progress);
				});
						
				Webcam.on('uploadComplete', function(code, text) {
					// Upload complete!
					// 'code' will be the HTTP response code from the server, e.g. 200
					// 'text' will be the raw response content
					//console.log(text);
				});

				Webcam.upload(data_uri, 'https://iceberg9.com/playground/face-recognition/modules/upload_image.php', function(code, text) {
					// Upload complete!
					// 'code' will be the HTTP response code from the server, e.g. 200
					// 'text' will be the raw response content
					//console.log(code);
					//console.log(text);
					$('#foto').val(text);
				});

			});

		});
	}
	

});