<?php
	session_start();
	require 'modules/config.php';
?>

<?php include 'header.php' ?>

	<div class="container-fluid">
	<section class="section__module section__module--nopadding">

		<div class="row">

			<div class="col-xs-12 col-sm-5 col-md-5">
				<img class="img-responsive" src="<?php print $site_url; ?>/assets/images/index-image.png" srcset="<?php print $site_url; ?>/assets/images/index-image@2x.png 2x">
			</div>

			<div class="col-xs-12 col-sm-7 col-md-7">
				<div class="login-box">
					<h2 class="element--center">Iniciar sesión</h2>

					<!-- <form action="modules/login.php" method="POST"> -->

						<div class="form__input-line">
							<label for="usuario" class="form__label">Usuario</label>
							<input type="text" id="usuario" class="form__input" name="usuario" placeholder="Ingresa tu usuario">
						</div>

						<div class="form__input-line">
							<label for="contraseña" class="form__label">Contraseña</label>
							<input type="password" id="password" class="form__input" name="password" placeholder="Ingresa tu contraseña">
						</div>

						<div class="form__input-line">
							<button id="send-login" class="cta cta--primary cta--full">Iniciar sesión</button>
							<div id="error-message" style="display: none;"></div>
						</div>

					<!-- </form> -->
				</div>
			</div>

		</div><!-- end ROW -->

	</section>
	</div>

<?php include 'footer.php' ?>