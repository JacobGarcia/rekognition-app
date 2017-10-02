<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<title>Face Recognition Module</title>
	<link href="https://fonts.googleapis.com/css?family=Raleway:400,500,600,700" rel="stylesheet">
	<link rel="stylesheet" href="<?php print $site_url; ?>/style.css">
</head>
<body>
	<div class="page__width">

		<header>
			<div class="container-fluid">
				<div class="row">
					<div class="col-xs-12 col-sm-6">
						<h1 class="header__title">Face<span class="header--bold">.Recognition.</span>Module</h1>
					</div>
					<div class="col-sm-6 hidden-xs">
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
			</div>
		</header>