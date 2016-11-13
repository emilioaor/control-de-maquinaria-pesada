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
			<h2>Maquinaria</h2>
			<hr>
			<p>Aqui podra visualizar toda la maquinaria disponible.</p>
		</div>


		<div id="lista-maquinaria">
			<div id="barra_maquinaria">
				<a href="encargado.php" class="btn boton_atras">Ir Atras</a>
				<h1>Lista de Maquinaria</h1>
			</div>
			
			<?php
				include_once('php/conectar.php');
				$q="select placa,modelo,tipo,foto,estatus FROM maquinaria,modelo_maquinaria,tipo_maquinaria WHERE modelo_maquinaria.codigo=cod_modelo AND tipo_maquinaria.codigo=cod_tipo";
				$result = mysqli_query($conectar,$q);
				$cantidad = mysqli_num_rows($result);

				for($x=1;$x<=$cantidad;$x++){
					$fila = mysqli_fetch_array($result);
					$placa = $fila[0];
					$modelo = $fila[1];
					$tipo = $fila[2];
					$foto = $fila[3];
					$estatus = $fila[4];

			?>
					<div class="maq">
						<img src="imagen_maquinaria/<?php echo $foto; ?>">
						<p><span>Placa:</span> <?php echo htmlentities($placa); ?></p>
						<p><span>Modelo:</span> <?php echo htmlentities($modelo); ?></p>
						<p><span>Tipo:</span> <?php echo htmlentities($tipo); ?></p>
						<p><span>Estatus:</span> <?php echo htmlentities($estatus); ?></p>
	
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