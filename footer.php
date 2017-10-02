	</div>
	<footer></footer>

	<div id="modal-registrador" class="modal__wrapper" style="display: none;">
		<div class="modal__box">
			<div class="modal__head element--right">
				<span class="modal__close" data-modal="modal-registrador">Cerrar</span>
			</div>
			<div class="modal__body element--center">
				<h2 class="modal__title">Visitante agregado con Éxito</h2>
				<span class="registrador__pin"></span>
			</div>
			<div class="modal__footer">
				<a href="<?php print $site_url ?>/dashboard/registrador/" class="cta cta--primary cta--full">Registrar otro visitante</a>
			</div>
		</div>
	</div>

	<script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
	<script src="<?php print $site_url; ?>/assets/js/webcam.js"></script>
	<script src="<?php print $site_url; ?>/assets/js/app.js"></script>
</body>
</html>