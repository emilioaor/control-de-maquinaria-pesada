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
<script type="text/javascript" src="js/eventos.js"></script>
<script type="text/javascript">
    $(window).load(function() {
        $('#slider').nivoSlider();
    });
    </script>
</head>
<body onscroll="BarraVertical();">

    <div class="header">	

    </div>
     
  	<div class="main">
	 	<div class="titulos">
	 		<br>
			<h2>Pagos</h2>
			<hr>
			<p>Podra verificar los pagos registrados por el cliente.</p>
		</div>


		<div id="lista-maquinaria">
			<div id="barra_maquinaria">
				<a href="encargado.php" class="btn boton_atras">Ir Atras</a>
				<h1>Pagos Registrados</h1>
			</div>
			
			<?php
				include_once('php/conectar.php');
				$q="select solicitud.codigo,cod_transaccion,monto,banco FROM pagos,banco,solicitud WHERE banco.codigo=cod_banco AND solicitud.codigo=cod_sol ORDER BY pagos.codigo DESC";
				$result = mysqli_query($conectar,$q);
				$cantidad = mysqli_num_rows($result);

				for($x=1;$x<=$cantidad;$x++){
					$fila = mysqli_fetch_array($result);
					$codigo_solicitud = $fila[0];
					$codigo_transaccion = $fila[1];
					$monto = $fila[2];
					$banco = $fila[3];

			?>
					<div class="maq">
						<img class="iconos_pagos" src="images/icono_pagos2.png">
						<p><span>Nº Solicitud:</span> <?php echo $codigo_solicitud; ?></p>
						<p><span>Codigo Transaccion:</span> <?php echo $codigo_transaccion; ?></p>
						<p><span>Monto:</span> <?php echo $monto; ?></p>
						<p><span>Banco:</span> <?php echo $banco; ?></p>
						
						<div class="clear"></div>
					</div>

			<?php } // fin ciclo for ?>
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