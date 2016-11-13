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
			<h2>Reportes</h2>
			<hr>
			<p>Puede generar distintos reportes generales o especificos.</p>
		</div>


		<div id="lista-maquinaria">
			<div id="barra_maquinaria">
				<a href="administrador.php" class="btn boton_atras">Ir Atras</a>
				<h1>Lista de Reportes</h1>
			</div>
				<form method="post" action="reporte-cliente.php">
					<div class="maq">
						<img src="images/icono_reporte2.png">
						<p><span>Solicitudes de Clientes</span></p>
						<p><span>Cliente:</span></p>
						<p>
							<select name="cliente" id="">
								<option value="0">Todos</option>
								<?php
									include_once('php/conectar.php');
									$q="select codigo,empresa FROM cliente";
									$result = mysqli_query($conectar,$q);
									$cantidad = mysqli_num_rows($result);
									for($x=1;$x<=$cantidad;$x++){
										$fila = mysqli_fetch_array($result);
										$cod_cliente = $fila[0];
										$empresa = $fila[1];
								?>
										<option value="<?php echo $cod_cliente; ?>"><?php echo $empresa; ?></option>
								<?php
									} // fin ciclo for 
								?>
							</select>
						</p>
						<p>
							<span>Desde: </span>
							<input type="number" name="dia1" min="1" max="31" value="1"> / 
							<input type="number" name="mes1" min="1" max="12" value="1"> / 
							<input type="number" name="ano1" min="2000" max="3000" value="2016">
						</p>
						<p>
							<span>Hasta: </span>
							<input type="number" name="dia2" min="1" max="31" value="1"> / 
							<input type="number" name="mes2" min="1" max="12" value="1"> / 
							<input type="number" name="ano2" min="2000" max="3000" value="2016">
						</p>
						<div id="espacio_btn">
							<button class="btn" type="submit">Generar</button>
						</div>
						<div class="clear"></div>
					</div>
				</form>


				<form method="post" action="reporte-maquinaria.php">
					<div class="maq">
						<img src="images/icono_reporte2.png">
						<p><span>Maquinaria Solicitada</span></p>
						<p><span>Placa de Maquinaria:</span></p>
						<p>
							<select name="placa" id="">
								<option>Todas</option>
								<?php
									include_once('php/conectar.php');
									$q2="select placa FROM maquinaria";
									$result2 = mysqli_query($conectar,$q2);
									$cantidad2 = mysqli_num_rows($result2);
									for($x=1;$x<=$cantidad2;$x++){
										$fila2 = mysqli_fetch_array($result2);
										$placa = $fila2[0];
								?>
										<option><?php echo $placa; ?></option>
								<?php
									} // fin ciclo for 
								?>
							</select>
						</p>
						<p>
							<span>Desde: </span>
							<input type="number" name="dia1" min="1" max="31" value="1"> / 
							<input type="number" name="mes1" min="1" max="12" value="1"> / 
							<input type="number" name="ano1" min="2000" max="3000" value="2016">
						</p>
						<p>
							<span>Hasta: </span>
							<input type="number" name="dia2" min="1" max="31" value="1"> / 
							<input type="number" name="mes2" min="1" max="12" value="1"> / 
							<input type="number" name="ano2" min="2000" max="3000" value="2016">
						</p>
						<div id="espacio_btn">
							<button class="btn" type="submit">Generar</button>
						</div>
						<div class="clear"></div>
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