<div class="container-fluid">
<section class="section__module">

	<div class="row">

		<div class="col-xs-12">
			<h2 class="head--nomargin element--left">Registro de visitante</h2>
			<hr>
		</div>
	</div>

	<div class="row">
		<div class="col-xs-12 col-md-6">
			<div class="form__input-line">
				<label for="nombre" class="form__label">Nombre Completo</label>
				<input type="text" id="nombre" class="form__input" name="nombre" placeholder="Captura el nombre completo del visitante">
			</div>

			<div class="form__input-line">
				<label for="sitio" class="form__label">Sitio</label>
					<select id="sitio" class="form__select" name="sitio">
						<option value="blank">-- Selecciona un sitio</option>
						<option value="lobby">lobby</option>
						<option value="salón conferencia 1">Salón conferencia 1</option>
						<option value="salón conferencia 2">Salón conferencia 2</option>
					</select>
					<div class="select--border"></div>
			</div>

			<div class="form__input-line">
				<label for="nombre" class="form__label">Aviso de Privacidad</label>
					<div class="form__checkbox">
						<input type="checkbox"> <span>¿Usuario acepta aviso de privacidad?</span>
					</div>
			</div>
		</div>
		<div class="col-xs-12 col-md-6">
			<div class="webcam__box">
				<div id="my_camera" class="webcam__live"></div>
				<span class="cta cta--secondary cta--full">Capturar Fotografía</span>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-xs-12">
			
			<div class="registrador__bottom">
				<div class="form__input-line">
					<button id="send-login" class="cta cta--primary cta--full">Enviar registro</button>
					<span id="login-message" class="form__error" style="display: none;"></span>
				</div>
			</div>

		</div>
	</div>

</section>
</div>