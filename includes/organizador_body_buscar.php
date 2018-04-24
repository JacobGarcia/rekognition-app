<div class="container-fluid">
<section class="section__module">

	<?php
		$title_section = 'Buscar visitante';
		include 'inner_header.php';
	?>

	<div class="row">
		<div class="col-xs-12">
			<div class="form__input-line">
				<label for="pin" class="form__label">PIN</label>
				<input type="text" id="pin" class="form__input" name="pin" placeholder="Captura PIN a buscar">
			</div>
		</div>
	</div>

	<div id="result-data" class="row" style="display: none;">

		<div class="col-xs-12 col-md-6">
			<div class="form__input-line">
				<label for="nombre" class="form__label">Nombre Completo</label>
				<input type="text" id="nombre" class="form__input" name="nombre" readonly>
			</div>

			<div class="form__input-line">
				<label for="sitio" class="form__label">Sitio</label>
					<?php include 'sites_select.php'; ?>
					<div class="select--border"></div>
			</div>

			<div class="form__input-line">
				<label for="fecha" class="form__label">Fecha y Hora</label>
					<input type="datetime-local" id="fecha" value="" class="form__input">
			</div>
		</div>

		<div class="col-xs-12 col-md-6">
			<div class="form__input-line">
				<label for="foto" class="form__label form__label--noinput">Fotografía Capturada</label>
				<div class="webcam__live">
					<div id="output-photo" class="webcam__render"></div>
				</div>
			</div>
		</div>

	</div>

	<div class="row">
		<div class="col-xs-12">
			
			<div class="registrador__bottom">
				<div class="form__input-line">
					<div id="error-message" style="display: none;"></div>
					<div id="initial-cta">
						<button id="search-pin" class="cta cta--primary cta--full">Buscar</button>	
					</div>
					<div id="final-cta" style="display: none;">
						<a href="index.php" class="cta cta--secondary cta--half cta--margin">Nueva búsqueda</a>
						<button id="update-user" class="cta cta--primary cta--half">Actualizar visitante</button>
					</div>
				</div>
			</div>

		</div>
	</div>

	<div class="row">
		<div class="col-xs-12">
			<hr>
		</div>
	</div>

</section>
</div>