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
						<option value="lobby">Lobby</option>
					</select>
					<div class="select--border"></div>
			</div>

			<div class="form__input-line">
				<label for="privacidad" class="form__label">Aviso de Privacidad</label>
					<div class="form__checkbox">
						<input type="checkbox" id="privacidad" name="privacidad" value="true"> <span>¿Usuario acepta aviso de privacidad?</span>
					</div>
			</div>

			<div class="form__input-line">
				<label for="foto" class="form__label form__label--noinput">Fotografía Capturada</label>
				<div class="webcam__live">
					<div id="image-output" class="webcam__render"></div>
				</div>
			</div>

			<div class="form__input-line" style="display: none;">
				<label for="foto" class="form__label">URL Photo</label>
				<input type="text" id="foto" class="form__input" name="foto" placeholder="URL en captura...">
			</div>

		</div>
		<div class="col-xs-12 col-md-6">
			<div class="webcam__box">
				<div class="webcam__live">
					<div id="my_camera" class="webcam__render"></div>
				</div>
				<span id="take-snap" class="cta cta--secondary cta--full">Capturar Fotografía</span>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-xs-12">
			
			<div class="registrador__bottom">
				<div class="form__input-line">
					<button id="send-register" class="cta cta--primary cta--full">Enviar registro</button>
					<div id="error-message" style="display: none;"></div>
				</div>
			</div>

		</div>
	</div>

</section>
</div>