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
			<h2>Procesar Pago</h2>
			<hr>
			<p>Debes hacer un deposito o transferencia en una de nuestras cuentas y luego de verificado el pago procederemos a aprobar tu solicitud.</p>
		</div>


		<div id="lista-maquinaria">
			<div id="barra_maquinaria">
				<a href="cliente-pagos.php" class="btn boton_atras">Ir Atras</a>
				<h1>Pago de Solicitud Nº: <?php echo $codigo_solicitud; ?></h1>

			</div>
			<div id="cuentas_bancarias">
				<h3>Cuentas Bancarias</h3>
				<p>
					<span>Banco Venezuela</span> <br>
					111-234543 34342343 <br>
					Pedro Perez C.A <br>
					15.741.852 <br>
					correo@mail.com
				</p>
				<p>
					<span>Banco Mercantil</span> <br>
					111-234543 34342343 <br>
					Pedro Perez C.A <br>
					15.741.852 <br>
					correo@mail.com
				</p>
				<p>
					<span>Banesco</span> <br>
					111-234543 34342343 <br>
					Pedro Perez C.A <br>
					15.741.852 <br>
					correo@mail.com
				</p>
				<div class="clear"></div>
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

				//AQUI DEBE IR LA INFORMACION DE LA SOLICITUD

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

			<form method="post" action="php/registrar_pago.php">

				<div class="pagar">
					<p id="p_total"><span>Total a Pagar:</span> <?php echo $total; ?> BsF</p> 
					<table>
						<tr>
							<th colspan="2"><h3>Registra tu Pago</h3></th>
						</tr>
						<tr>
							<th>Codigo de Transaccion</th>
							<th><input type="text" name="cod_trans" class="caja"></th>
						</tr>
						<tr>
							<th>Monto de la Transaccion</th>
							<th><input type="text" name="monto_trans" class="caja"></th>
						</tr>
						<tr>
							<th>Banco</th>
							<th>
								<select name="banco" class="caja">
									<?php  
										$q3="select * from banco";
										$result3 = mysqli_query($conectar,$q3);
										$cantidad3 = mysqli_num_rows($result3);

										for($x=1;$x<=$cantidad3;$x++){
											$fila3 = mysqli_fetch_array($result3);
											$cod_banco = $fila3[0];
											$banco = $fila3[1];
									?>
											<option value="<?php echo $cod_banco; ?>"><?php echo htmlentities($banco); ?></option>
									<?php } // fin ciclo for cantidad3 ?>
								</select>
							</th>
						</tr>
					</table>
					<div class="clear"></div>
				</div>
				<div class="div_centrar">
					<input type="hidden" name="cod_solicitud" value="<?php echo $codigo_solicitud ?>">
					<button id="btn_generar" type="submit" class="btn">Registrar</button>
				</div>

			</form>

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