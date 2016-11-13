<?php include_once('php/sesiones.php'); ?>
<!DOCTYPE HTML>
<html>
<head>
<title>IAR GROUP S.A.</title>
<link rel="shortcut icon" href="images/logo%20IAR%20GRUOP.jpg">
<link rel="stylesheet" href="css/fontello.css">
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href='http://fonts.googleapis.com/css?family=PT+Sans' rel='stylesheet' type='text/css'>
<link rel="stylesheet" type="text/css" href="css/clientes.css">
<!--slider-->
<link href="css/slider.css" rel="stylesheet" type="text/css" media="all"/>
<script type="text/javascript" src="js/jquery-1.9.0.min.js"></script>
<script type="text/javascript" src="js/jquery.nivo.slider.js"></script>
<script type="text/javascript">
    $(window).load(function() {
        $('#slider').nivoSlider();
    });
    </script>
</head>
<body>

    <div class="header">	

    </div>
     
  	<div class="main">
	 	<div class="titulos">
	 		<br>
			<h2>Administrador</h2>
			<hr>
			<p>Panel para administrar registros y precios de la maquinaria. Exclusiva para administradores de la aplicacion.</p>
		</div>

		<div id="menu">
			<div class="icono">
				<a href="administrador-maquinaria.php">
					<img src="images/icono_maquinaria.png"><br>
					<p>Maquinaria</p>
				</a>
			</div>
			<div class="icono">
				<a href="administrador-modelo-maquinaria.php">
					<img src="images/icono_modelo.png"><br>
					<p>Modelo</p>
				</a>
			</div>
			<div class="icono">
				<a href="administrador-solicitudes.php">
					<img src="images/icono_solicitud.png"><br>
					<p>Solicitudes</p>
				</a>
			</div>
			<div class="icono">
				<a href="administrador-pagos.php">
					<img src="images/icono_pagos.png"><br>
					<p>Pagos</p>
				</a>
			</div>
			<div class="icono">
				<a href="administrador-reportes.php">
					<img src="images/icono_reporte.png"><br>
					<p>Reportes</p>
				</a>
			</div>
			<div class="icono">
				<a href="php/cerrar_sesion.php">
					<img src="images/icono_salir.png"><br>
					<p>Salir</p>
				</a>
			</div>
		</div>
	</div>
	
	
	<div class="footer">
		<div class="wrap">
			<div class="footer-text">
				<p>SIGUENOS A TRAVEZ DE NUESTRAS REDES SOCIALES Y FORMA PARTE DE NUESTRA FAMILIA</p>
				<ul class="follow_icon">
					<li><a href="#"><img src="images/fb.png" alt=""></a></li>
					<li><a href="#"><img src="images/tw.png" alt=""></a></li>
					<li><a href="#"><img src="images/g+.png" alt=""></a></li>	
				</ul>
				
				<div class="copy">
					<p><a href="#">IAR GROUP S.A.</a></p>
				</div>
			</div>	
		</div>
	</div>
</body>
</html>