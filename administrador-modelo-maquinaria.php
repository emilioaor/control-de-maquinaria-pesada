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
			<h2>Administrar Modelos</h2>
			<hr>
			<p>Aqui podra visualizar todos los modelos de maquinaria, agregar nuevos y modificar datos</p>
		</div>


		<div id="lista-maquinaria">
			<div id="barra_maquinaria">
				<a href="administrador.php" class="btn boton_atras">Ir Atras</a>
				<h1>Lista de Modelos</h1>
			</div>

			<form method="post" enctype="multipart/form-data" action="php/agregar-modelo.php">
						<div class="maq">
							<img src="images/icono_agregar.png">
							<p><span>Modelo:</span> <input type="text" name="modelo" value="<?php echo htmlentities($modelo); ?>"></p>
							<p>
								<span>Tipo:</span> 
								<select name="cod_tipo">
									<?php
										include_once('php/conectar.php');
										$q2="select * from tipo_maquinaria";
										$result2 = mysqli_query($conectar,$q2);
										$cantidad2 = mysqli_num_rows($result2);

										for($y=1;$y<=$cantidad2;$y++){
											$fila2=mysqli_fetch_array($result2);
											$codigo_tipo =$fila2[0];
											$tipo = $fila2[1];
									?>
											<option value="<?php echo $codigo_tipo; ?>"><?php echo $tipo; ?></option>
												
									<?php } //fin ciclo for cantidad3 ?>
								
								</select>
							</p>
							<p><span>Precio por dia:</span> <input type="text" name="precio" value="<?php echo $precio_aql; ?>"></p>
							<p><span>Mora:</span> <input type="text" name="mora" value="<?php echo $precio_mora; ?>"></p>
							<p><span>Precio Traslado:</span> <input type="text" name="precio_tras" value=""></p>
							<p><span>Foto:</span> <input type="file" name="imagen"></p>
							<div id="espacio_btn">
								<button class="btn" type="submit">Agregar</button>
								
							</div>
											
							<div class="clear"></div>
						</div>
					</form>
			
			<?php
				//Desplegar lista de modelos de maquinaria
				$q="select * from modelo_maquinaria";
				$result = mysqli_query($conectar,$q);
				$cantidad = mysqli_num_rows($result);

				for($x=1;$x<=$cantidad;$x++){
					$fila = mysqli_fetch_array($result);
					$codigo_modelo = $fila[0];
					$modelo = $fila[1];
					$cod_tipo = $fila[2];
					$precio_aql = $fila[3];
					$precio_mora = $fila[4];
					$cantidad_modelo = $fila[5];
					$foto = $fila[6];
					$precio_tras = $fila[7];

			?>
					<form method="post" action="php/actualizar-modelo.php">
						<div class="maq">
							<img src="imagen_maquinaria/<?php echo $foto; ?>" id="m<?php echo $codigo_modelo ?>">
							<p><span>Modelo:</span> <input type="text" name="modelo" value="<?php echo htmlentities($modelo); ?>"></p>
							<p>
								<span>Tipo:</span> 
								<select name="cod_tipo">
									<?php
										$q3="select * from tipo_maquinaria";
										$result3 = mysqli_query($conectar,$q3);
										$cantidad3 = mysqli_num_rows($result3);

										for($y=1;$y<=$cantidad3;$y++){
											$fila3=mysqli_fetch_array($result3);
											$codigo_tipo =$fila3[0];
											$tipo = $fila3[1];
									?>
											<?php if($codigo_tipo==$cod_tipo){ ?>

												<option value="<?php echo $codigo_tipo; ?>" selected><?php echo $tipo; ?></option>
											<?php  }else{ ?>

												<option value="<?php echo $codigo_tipo; ?>"><?php echo $tipo; ?></option>
											<?php } //fin IF codigo_tipo=cod_tipo ?>
												
									<?php } //fin ciclo for cantidad2 ?>
								
								</select>
							</p>
							<p><span>Precio por dia:</span> <input type="text" name="precio" value="<?php echo $precio_aql; ?>"></p>
							<p><span>Mora:</span> <input type="text" name="mora" value="<?php echo $precio_mora; ?>"></p>
							<p><span>Precio Traslado:</span> <input type="text" name="precio_tras" value="<?php echo $precio_tras; ?>"></p>
							<p><span>Cantidad:</span> <?php echo $cantidad_modelo; ?></p>
							<div id="espacio_btn">
								<input type="hidden" value="<?php echo $codigo_modelo; ?>" name="cod_modelo">
								<button class="btn" type="submit">Actualizar</button>
								
							</div>
											
							<div class="clear"></div>
						</div>
					</form>

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