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
			<h2>Solicitudes</h2>
			<hr>
			<p>Lista de todas las solicitudes que ha tramitado con nosotros.</p>
		</div>


		<div id="lista-maquinaria">
			<div id="barra_maquinaria">
				<a href="cliente.php" class="btn boton_atras">Ir Atras</a>
				<h1>Lista de Solicitudes</h1>
			</div>
			
			<?php
				include_once('php/conectar.php');
				$q="select * from solicitud where cod_cliente=$cod_cliente_sesion order by codigo desc";
				$result = mysqli_query($conectar,$q);
				$cantidad = mysqli_num_rows($result);

				for($x=1;$x<=$cantidad;$x++){
					$fila = mysqli_fetch_array($result);
					$codigo_solicitud = $fila[0];
					$descripcion = $fila[1];
					$cod_cliente = $fila[2];
					$direccion = $fila[3];
					$fecha = $fila[4];
					$total = $fila[5];
					$estatus = $fila[6];

					$q2 ="select foto FROM solicitud,solicitud_maquinaria,maquinaria,modelo_maquinaria WHERE solicitud.codigo=cod_sol AND placa=placa_maq AND modelo_maquinaria.codigo=cod_modelo AND solicitud.codigo=$codigo_solicitud";
					$result2= mysqli_query($conectar,$q2);
					$fila2 = mysqli_fetch_array($result2);
					$foto = $fila2[0];
			?>
					<div class="maq">
						<img src="imagen_maquinaria/<?php echo $foto; ?>">
						<p><span>Nº Solicitud:</span> <?php echo $codigo_solicitud; ?></p>
						<p><span>Fecha:</span> <?php echo $fecha; ?></p>
						<p><span>Total:</span> <?php echo $total; ?></p>
						<p><span>Estatus:</span> <?php echo $estatus; ?></p>
						<div id="espacio_btn">
							<form method="post" action="cliente-ver-solicitud.php">
								<input type="hidden" value="<?php echo $codigo_solicitud; ?>" name="cod_solicitud">
								<button class="btn" type="submit">Ver</button>
							</form>
						</div>
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