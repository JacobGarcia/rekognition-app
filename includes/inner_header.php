<div class="row">
	<div class="col-xs-6">
		<h2 class="head--nomargin element--left"><?php print $title_section; ?></h2>
	</div>
	<div class="col-xs-6">
		<nav>
			<ul class="menu">
				<?php
					if ($rol == 'policia'):
						print '<li class="menu__element"><a href="'.$site_url.'/dashboard/policia/" class="menu__anchor">Registrar</a></li>';
						print '<li class="menu__element"><a href="'.$site_url.'/dashboard/policia/buscar/" class="menu__anchor">Buscar</a></li>';
					endif;
					if (isset($_SESSION['rol'])):
						print '<li class="menu__element"><a href="'.$site_url.'/logout.php" class="menu__anchor">Cerrar sesión</a></li>';
					endif;
				?>
			</ul>
		</nav>
	</div>
</div>

<div class="row">
	<div class="col-xs-12">
		<hr>
	</div>
</div>