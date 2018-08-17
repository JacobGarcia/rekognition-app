<?php
	require 'config.php';
	require 'functions.php';
	include 'header.php';
?>
<div class="tab">
  <button class="tablinks" onclick="window.location='./register-user.php';">Register</button>
  <button class="tablinks" onclick="window.location='./login-user.php';">Login</button>
  <button class="tablinks" onclick="window.location='./logout-user.php';">Logout</button>
</div>

<h3>LOGIN</h3>
<div class="form">
	<div class="form__input">
		<label for="pin">PIN</label>
		<input type="text" name="pin" id="pin" class="" value="">
		<span class="form__info">El PIN es auto-generado dinamicamente. Si necesitas generar otro PIN solo recarga la página.</span>
	</div>
	<div class="form__input">
		<label for="pin">Sitio</label>
		<?php include 'get_sites.php'; ?>
	</div>
	<div class="form__input input--center-content">
		<button id="login-user" class="cta">Validar usuario</button>
	</div>
	<div id="output-message"></div>
	<div id="output-image" style="display: none;"><p>Esperando respuesta del servidor...</p></div>
</div>


<?php
	include 'footer.php';
?>
