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
</head>
<body onscroll="BarraVertical();">

    <div class="header">	

    </div>
     
  	<div class="main">
	 	<div class="titulos">
	 		<br>
			<h2>Solicitud</h2>
			<hr>
			<p>Deberas rellenar los datos del siguiente formulario para generar la solicitud. Luego debes proceder a registrar el pago correspondiente</p>
		</div>

		<form method="post" action="php/generar_solicitud.php">
			<div id="lista-maquinaria">
				<div id="barra_maquinaria">
					<a href="cliente-maquinaria.php" class="btn boton_atras">Ir Atras</a>
					<h1>Formulario de Solicitud</h1>
				</div>

				<div id="ingreso">
					<table>
						<tr>
							<th>¿Algun requerimiento especial?</th>
						</tr>
						<tr>
							<th><textarea name="descripcion" class="caja"></textarea></th>
						</tr>
						<tr>
							<th>¿A que direccion necesita la maquinaria?</th>
						</tr>
						<tr>
							<th><textarea name="direccion" class="caja"></textarea></th>
						</tr>
						<tr>
							<th>Maquinaria agregada a esta solicitud. Vuelve atras para modificar</th>
						</tr>
					</table>
			</div>
			<br>
				<?php
					include_once('php/conectar.php');

					//obtener codigo solicitud temporal
					$q3="select * from solicitud_temp where cod_cliente=$cod_cliente_sesion";
					$result3 = mysqli_query($conectar,$q3);
					$fila3 =mysqli_fetch_array($result3);
					$cod_sol_temp = $fila3[0];

					//Verificar si este modelo esta en la temporal. Para mostrar boton quitar
					$q="select * FROM solicitud_temp,temporal_maquinaria,modelo_maquinaria WHERE solicitud_temp.codigo=codigo_temp AND codigo_maq=modelo_maquinaria.codigo AND solicitud_temp.codigo=$cod_sol_temp";
					$result = mysqli_query($conectar,$q);
					$cantidad = mysqli_num_rows($result);

					for($x=1;$x<=$cantidad;$x++){
						$fila = mysqli_fetch_array($result);
						$codigo_modelo = $fila[4];
						$modelo = $fila[5];
						$cod_tipo = $fila[6];
						$precio_aql = $fila[7];
						$precio_mora = $fila[8];
						$cantidad_modelo = $fila[9];
						$foto = $fila[10];
						$precio_tras = $fila[11];

						//obtener el tipo de maquinaria
						$q2="select * from tipo_maquinaria where codigo=$cod_tipo";
						$result2 = mysqli_query($conectar,$q2);
						$cantidad2 = mysqli_num_rows($result2);
						$fila2 = mysqli_fetch_array($result2);
						$tipo_maq = $fila2[1];

				?>
						<div class="maq">
							<img src="imagen_maquinaria/<?php echo $foto; ?>">
							<p><span>Modelo:</span> <?php echo htmlentities($modelo); ?></p>
							<p><span>Tipo:</span> <?php echo htmlentities($tipo_maq); ?></p>
							<p><span>Precio:</span> <?php echo $precio_aql; ?></p>
							<p><span>Mora:</span> <?php echo $precio_mora; ?></p>
							<p><span>Precio Traslado:</span> <?php echo $precio_tras; ?></p>
							<p><span>Cantidad:</span> <?php echo $cantidad_modelo; ?></p>
							<div id="espacio_btn2">
								<p id="p_btn2">
									¿Cantidad para este modelo?
								</p>
								<br>
								<input type="text" value="0" class="caja_peque" name="c<?php echo $x; ?>"><br>
								<p id="p_btn3">
									¿Dias de alquiler?
								</p>
								<br>
								<input type="text" value="0" class="caja_peque" name="d<?php echo $x; ?>"><br>
								<p id="p_btn4">
									¿Nos encargamos del traslado?
								</p>
								<br>
								<input type="radio" value="SI" name="r<?php echo $x; ?>" checked>Si por favor<br>
								<input type="radio" value="NO" name="r<?php echo $x; ?>">No, yo me encargo<br>
							</div>
							<div class="clear"></div>
						</div>

				<?php } // fin ciclo for ?>

			</div>
			<div class="div_centrar">
				<input type="hidden" name="cod_sol_temp" value="<?php echo $cod_sol_temp; ?>">
				<button id="btn_generar" type="submit" class="btn">Generar</button>
			</div>
		</form>
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