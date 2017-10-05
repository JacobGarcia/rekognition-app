<div class="container-fluid">
<section class="section__module">

	<?php
		$title_section = 'Buscar visitante';
		include 'inner_header.php';
	?>

	<div class="row">
		<div class="col-xs-12 col-md-6">
			<div class="form__input-line">
				<label for="pin" class="form__label">PIN</label>
				<input type="text" id="pin" class="form__input" name="pin" placeholder="Captura PIN del visitante">
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
					<div id="error-message" style="display: none;"></div>
					<button id="search-visitor" class="cta cta--primary cta--full">Buscar visitante</button>
				</div>
			</div>

		</div>
	</div>

</section>
</div>