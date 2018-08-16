var raw_image_data = 0

$(function() {
  // Función para login -- Hacemos el redirect al dashboard segun el rol de canela
  $('#send-login').click(function() {
    $.ajax({
      //url: 'https://iceberg9.com/playground/face-recognition/modules/login.php',
      url: 'https://frm.kawlantid.com/modules/login.php',
      type: 'POST',
      data: {
        usuario: $('#usuario').val(),
        password: $('#password').val()
      },
      beforeSend: function() {
        $('#send-login').html('Procesando, espere por favor...')
        $('#send-login').attr('disabled', 'disabled')
      },
      success: function(response) {
        $('#send-login').html('Iniciar sesión')
        $('#send-login').removeAttr('disabled')
        if (loginUser.login) {
          window.location.href = loginUser.url
        } else {
          $('#error-message').fadeIn()
          $('#error-message').prepend(
            '<span class="form__error">' + loginUser.message + '</span>'
          )
        }
      }
    })
  })

  // Registro de usuario con validaciones de campos
  $('#send-register').click(function() {
    var modalOutput = $(this).attr('data-modal-related')
    var v_data = 0

    $('#error-message').html('')

    if ($('#nombre').val() != '') {
      v_data++
    } else {
      $('#error-message').prepend(
        '<span class="form__error">Necesitas ingresar un Nombre.</span>'
      )
    }

    if ($('#sitio').val() != 'blank') {
      v_data++
    } else {
      $('#error-message').prepend(
        '<span class="form__error">Necesitas seleccionar un Sitio.</span>'
      )
    }

    if ($('#privacidad').is(':checked')) {
      v_data++
    } else {
      $('#error-message').prepend(
        '<span class="form__error">Necesitas aceptar el Aviso de Privacidad.</span>'
      )
    }

    if ($('#foto').val() != '') {
      v_data++
    } else {
      $('#error-message').prepend(
        '<span class="form__error">Necesitas capturar una Fotografía.</span>'
      )
    }

    if (v_data == 4) {
      $.ajax({
        //url: 'https://iceberg9.com/playground/face-recognition/modules/register_user.php',
        url: 'https://frm.kawlantid.com/modules/register_user.php',
        type: 'POST',
        data: {
          nombre: $('#nombre').val(),
          sitio: $('#sitio').val(),
          privacidad: $('#privacidad').val(),
          foto: $('#foto').val()
        },
        beforeSend: function() {
          $('#send-register').html('Procesando, espere por favor...')
          $('#send-register').attr('disabled', 'disabled')
        },
        success: function(response) {
          //console.log(modalOutput);
          $('#send-register').html('Enviar registro')
          $('#send-register').removeAttr('disabled')
          if (registerUser.response) {
            $(modalOutput).fadeIn()
            $(modalOutput + ' .registrador__pin').html(
              'PIN: ' + registerUser.pin + ''
            )
          } else {
            //console.log('Error: ' + registerUser.response);
            $('#error-message').html('')
            $('#error-message').fadeIn()
            $('#error-message').html(
              '<span class="form__error">' + registerUser.message + '</span>'
            )
          }
        }
      })
    } else {
      $('#error-message').fadeIn()
    }
  })

  // Buscamos al visitante
  $('#search-visitor').click(function() {
    var v_data = 0

    $('#error-message').html('')

    if ($('#pin').val() != '') {
      v_data++
    } else {
      $('#error-message').prepend(
        '<span class="form__error">Necesitas ingresar el PIN del visitante.</span>'
      )
    }

    if ($('#foto').val() != '') {
      v_data++
    } else {
      $('#error-message').prepend(
        '<span class="form__error">Necesitas capturar una Fotografía.</span>'
      )
    }

    if (v_data == 2) {
      $.ajax({
        //url: 'https://iceberg9.com/playground/face-recognition/modules/search_visitor.php',
        url: 'https://frm.kawlantid.com/modules/search_visitor.php',
        type: 'POST',
        data: {
          pin: $('#pin').val(),
          foto: $('#foto').val()
        },
        beforeSend: function() {
          $('#search-visitor').html('Procesando, espere por favor...')
          $('#search-visitor').attr('disabled', 'disabled')
        },
        success: function(response) {
          //console.log(searchUser);
          $('#search-visitor').html('Buscar visitante')
          $('#search-visitor').removeAttr('disabled')

          if (searchUser.response == 'true') {
            $('#modal-policia').fadeIn()
            $('#modal-policia .modal__title').html('Visitante verificado')
            $('#modal-policia .registrador__pin').html('Permitir Acceso')
          } else {
            $('#error-message').html('')
            $('#error-message').fadeIn()
            $('#error-message').html(
              '<span class="form__error">' + searchUser.message + '</span>'
            )
          }
        }
      })
    } else {
      $('#error-message').fadeIn()
    }
  })

  // Buscamos el PIN
  $('#search-pin').click(function() {
    var v_data = 0

    $('#error-message').html('')

    if ($('#pin').val() != '') {
      v_data++
    } else {
      $('#error-message').prepend(
        '<span class="form__error">Necesitas ingresar el PIN a buscar.</span>'
      )
    }

    if (v_data == 1) {
      $.ajax({
        //url: 'https://iceberg9.com/playground/face-recognition/modules/search_pin.php',
        url: 'https://frm.kawlantid.com/modules/search_pin.php',
        type: 'POST',
        data: {
          pin: $('#pin').val()
        },
        beforeSend: function() {
          $('#search-pin').html('Procesando, espere por favor...')
          $('#search-pin').attr('disabled', 'disabled')
        },
        success: function(response) {
          //console.log(searchUser);
          $('#search-pin').html('Buscar')
          $('#search-pin').removeAttr('disabled')
          if (searchPin.response) {
            //console.log(searchPin);
            $('#result-data').fadeIn()
            $('#initial-cta').hide()
            $('#final-cta').fadeIn()
            $('#nombre').val(searchPin.name)
            $('#output-photo').html(
              '<img src="http://ec2-13-59-176-172.us-east-2.compute.amazonaws.com' +
                searchPin.photo +
                '">'
            )
          } else {
            $('#error-message').html('')
            $('#error-message').fadeIn()
            $('#error-message').html(
              '<span class="form__error">' + searchPin.message + '</span>'
            )
          }
        }
      })
    } else {
      $('#error-message').fadeIn()
    }
  })

  // Actualizamos registro
  $('#update-user').click(function() {
    var v_data = 0

    $('#error-message').html('')

    if ($('#pin').val() != '') {
      v_data++
    } else {
      $('#error-message').prepend(
        '<span class="form__error">Necesitas ingresar el PIN a buscar.</span>'
      )
    }

    if (v_data == 1) {
      $.ajax({
        //url: 'https://iceberg9.com/playground/face-recognition/modules/update_visitor.php',
        url: 'https://frm.kawlantid.com/modules/update_visitor.php',
        type: 'POST',
        data: {
          pin: $('#pin').val(),
          sitio: $('#sitio').val(),
          fecha: $('#fecha').val()
        },
        beforeSend: function() {
          $('#update-user').html('Procesando, espere por favor...')
          $('#update-user').attr('disabled', 'disabled')
        },
        success: function(response) {
          //console.log(searchUser);
          $('#update-user').html('Actualizar visitante')
          $('#update-user').removeAttr('disabled')
          if (updateVisitor.response) {
            $('#modal-actualizar').fadeIn()
            $('#modal-actualizar .modal__title').html('Proceso terminado')
            $('#modal-actualizar .registrador__pin').html(
              'Visitante actualizado correctamente.'
            )
          } else {
            $('#error-message').html('')
            $('#error-message').fadeIn()
            $('#error-message').html(
              '<span class="form__error">' + updateVisitor.message + '</span>'
            )
          }
        }
      })
    } else {
      $('#error-message').fadeIn()
    }
  })

  // Cerrar modales | Universal
  $('.modal__close').click(function() {
    var chooseModal = $(this).attr('data-modal')
    $('#' + chooseModal).hide()
  })

  // Webcam JS | Primero verificamos que el DIV contenedor de camera exista y luego inicializamos el Script
  if ($('#my_camera').length) {
    Webcam.set({
      width: 240,
      height: 160,
      dest_width: 240,
      dest_height: 140,
      image_format: 'jpeg',
      jpeg_quality: 90
    })

    Webcam.attach('#my_camera')

    //function take_snapshot() {
    $('#take-snap').click(function() {
      Webcam.snap(function(data_uri) {
        // Mostramos la fotografía en el DOM
        $('#image-output').html('<img src="' + data_uri + '"/>')

        // Guardamos base64 de la imagen en input
        //raw_image_data = data_uri.replace(/^data\:image\/\w+\;base64\,/, '');
        //$('#foto').val(raw_image_data);
        $('#foto').val(data_uri)

        /*
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
					console.log(code);
					console.log(text);
					$('#foto').val(text);
				});
				*/
      })
    })
  }
})
