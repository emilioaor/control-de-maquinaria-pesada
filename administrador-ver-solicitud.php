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
<link rel="stylesheet" type="text/css" href="css/estilos_ingreso.css">
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
<?php $codigo_solicitud = $_POST['cod_solicitud']; ?>
</head>
<body onscroll="BarraVertical();">

    <div class="header">	

    </div>
     
  	<div class="main">
	 	<div class="titulos">
	 		<br>
			<h2>Ver Solicitud</h2>
			<hr>
			<p>Visualiza el detalle de la solicitud seleccionada.</p>
		</div>


		<div id="lista-maquinaria">
			<div id="barra_maquinaria">
				<a href="administrador-solicitudes.php" class="btn boton_atras">Ir Atras</a>
				<h1>Detalle de la Solicitud Nº: <?php echo $codigo_solicitud; ?></h1>

			</div>
						
			<?php
				include_once('php/conectar.php');

				$q="select * from solicitud where codigo=$codigo_solicitud";
				$result = mysqli_query($conectar,$q);

				$fila = mysqli_fetch_array($result);
				$descripcion = $fila[1];
				$direccion = $fila[3];
				$fecha = $fila[4];
				$total = $fila[5];
				$estatus = $fila[6];

			?>

				<div id="detalle_solicitud">
					<p class="pd1">
						<span>Fecha: </span><?php echo $fecha; ?>
					</p>
					<p class="pd2">
						<span>Descripcion: </span><?php echo $descripcion; ?>
					</p>
					<p class="pd2">
						<span>Direccion: </span><?php echo $direccion; ?>
					</p>
					<div class="clear"></div>
				</div>

			<?php
				//obtener items de la solicitud
				$q2 ="select placa,modelo,tipo,solicitud_maquinaria.precio_alq,dias,foto,solicitud_maquinaria.precio_tras FROM solicitud,solicitud_maquinaria,maquinaria,modelo_maquinaria,tipo_maquinaria WHERE solicitud.codigo=cod_sol AND placa=placa_maq AND modelo_maquinaria.codigo=cod_modelo AND tipo_maquinaria.codigo=cod_tipo AND solicitud.codigo=$codigo_solicitud";
				$result2= mysqli_query($conectar,$q2);
				$cantidad2 = mysqli_num_rows($result2);
				$total=0;

				for($x=1;$x<=$cantidad2;$x++){

					$fila2 = mysqli_fetch_array($result2);
					$placa = $fila2[0];
					$modelo = $fila2[1];
					$tipo = $fila2[2];
					$precio_alq = $fila2[3];
					$dias = $fila2[4];
					$foto = $fila2[5];
					$precio_tras = $fila2[6];

					$subtotal = $precio_alq * $dias;
					$total+= $subtotal+$precio_tras;
			?>
					<div class="maq">
						<img src="imagen_maquinaria/<?php echo $foto; ?>">
						<p><span>Placa:</span> <?php echo htmlentities($placa); ?></p>
						<p><span>Modelo:</span> <?php echo htmlentities($modelo); ?></p>
						<p><span>Tipo:</span> <?php echo htmlentities($tipo); ?></p>
						<p><span>Precio por dia:</span> <?php echo $precio_alq; ?></p>
						<p><span>Dias solicitados:</span> <?php echo $dias; ?></p>

						<div id="espacio_btn">
							<p><span>Subtotal:</span><br> <?php echo $subtotal; ?> BsF</p>							
						</div>

						<div class="clear"></div>
					</div>

					<!-- Cargo por el traslado -->
					<div class="maq">
						<img src="images/icono_traslado.png">
						<p><span>Recarga por el traslado</span></p>

						<div id="espacio_btn3">
							<p><span>Subtotal:</span><br> <?php echo $precio_tras; ?> BsF</p>							
						</div>

						<div class="clear"></div>
					</div>

			<?php } // fin ciclo for ?>

			<div class="pagar">
				<p id="p_total"><span>Total a Pagar:</span> <?php echo $total; ?> BsF</p> 
				<div class="clear"></div>
			</div>

	
			<div class="div_centrar">

				<?php if($estatus=='Por Aprobar'){ ?>
						<form method="post" action="php/administrador-aprobar-solicitud.php" class="form-aprobar">
							<input type="hidden" name="cod_solicitud" value="<?php echo $codigo_solicitud ?>">
							<button id="btn_generar" type="submit" class="btn">Aprobar</button>
						</form>
				<?php } //fin IF ?>
				
				<?php if($estatus=='Pendiente' || $estatus=='Por Aprobar'){ ?>
						<form method="post" action="php/administrador-cancelar-solicitud.php" <?php if($estatus=='Por Aprobar'){ ?>class="form-aprobar" <?php } ?> >
							<input type="hidden" name="cod_solicitud" value="<?php echo $codigo_solicitud ?>">
							<button id="btn_cancelar" type="submit" class="btn">Cancelar</button>
						</form>
				<?php } //fin IF ?>

				<?php if($estatus=='Aprobada'){ ?>
						<form method="post" action="php/administrador-recibir-solicitud.php" >
							<input type="hidden" name="cod_solicitud" value="<?php echo $codigo_solicitud ?>">
							<button id="btn_recibir" type="submit" class="btn">Recibir</button>
						</form>
				<?php } //fin IF ?>

				<div class="clear"></div>
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