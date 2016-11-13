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
			<h2>Administrar Maquinaria</h2>
			<hr>
			<p>Aqui podra visualizar toda la maquinaria, agregar nueva y modificar datos</p>
		</div>


		<div id="lista-maquinaria">
			<div id="barra_maquinaria">
				<a href="administrador.php" class="btn boton_atras">Ir Atras</a>
				<h1>Lista de Maquinaria</h1>
			</div>

			<form method="post" action="php/agregar-maquinaria.php">
						<div class="maq">
							<img src="images/icono_agregar.png">
							<p><span>Placa:</span> <input type="text" name="placa"></p>
							<p>
								<span>Modelo:</span> 
									<select name="cod_modelo">
										<?php
											include_once('php/conectar.php');
											$q3="select * from modelo_maquinaria";
											$result3 = mysqli_query($conectar,$q3);
											$cantidad3 = mysqli_num_rows($result3);

											for($y=1;$y<=$cantidad3;$y++){
												$fila3=mysqli_fetch_array($result3);
												$codigo_modelo =$fila3[0];
												$mode = $fila3[1];
										?>

												<option value="<?php echo $codigo_modelo; ?>"><?php echo $mode; ?></option>
												
													
										<?php } //fin ciclo for cantidad3 ?>
									
									</select>
								</p>
							<p>
								<span>Estatus: </span> Disponible
							</p>
							<div id="espacio_btn">
								<button class="btn" type="submit">Agregar</button>
								
							</div>
											
							<div class="clear"></div>
						</div>
					</form>
			
			<?php
				//Desplegar lista de maquinaria
				$q="select placa,cod_modelo,modelo,estatus,foto FROM maquinaria,modelo_maquinaria WHERE codigo=cod_modelo";
				$result = mysqli_query($conectar,$q);
				$cantidad = mysqli_num_rows($result);

				for($x=1;$x<=$cantidad;$x++){
					$fila = mysqli_fetch_array($result);
					$placa = $fila[0];
					$cod_modelo = $fila[1];
					$modelo = $fila[2];
					$estatus = $fila[3];
					$foto = $fila[4];

			?>
					<form method="post" action="php/actualizar-maquinaria.php">
						<div class="maq">
							<img src="imagen_maquinaria/<?php echo $foto; ?>" id="<?php echo $placa ?>">
							<p><span>Placa:</span> <?php echo htmlentities($placa); ?></p>
							<p>
								<span>Modelo:</span> 
								<select name="cod_modelo">
									<?php
										$q3="select * from modelo_maquinaria";
										$result3 = mysqli_query($conectar,$q3);
										$cantidad3 = mysqli_num_rows($result3);

										for($y=1;$y<=$cantidad3;$y++){
											$fila3=mysqli_fetch_array($result3);
											$codigo_modelo =$fila3[0];
											$mode = $fila3[1];
									?>
											<?php if($codigo_modelo==$cod_modelo){ ?>

												<option value="<?php echo $codigo_modelo; ?>" selected><?php echo $mode; ?></option>
											<?php  }else{ ?>

												<option value="<?php echo $codigo_modelo; ?>"><?php echo $mode; ?></option>
											<?php } //fin IF codigo_modelo ?>
												
									<?php } //fin ciclo for cantidad3 ?>
								
								</select>
							</p>
							<p>
								<span>Estatus: </span> <?php echo htmlentities($estatus); ?>
							</p>
							<div id="espacio_btn">
								<input type="hidden" value="<?php echo $placa; ?>" name="placa">
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