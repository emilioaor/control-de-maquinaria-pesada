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
			<p>Aqui podra visualizar toda la maquinaria disponible y a su disposicion. Podra agregar cualquiera de estos equipos a su solicitud para luego procesarla.</p>
		</div>


		<div id="lista-maquinaria">
			<div id="barra_maquinaria">
				<a href="cliente.php" class="btn boton_atras">Ir Atras</a>
				<h1>Lista de Maquinaria</h1>
			</div>
			
			<?php
				include_once('php/conectar.php');
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

					//obtener el tipo de maquinaria
					$q2="select * from tipo_maquinaria where codigo=$cod_tipo";
					$result2 = mysqli_query($conectar,$q2);
					$cantidad2 = mysqli_num_rows($result2);
					$fila2 = mysqli_fetch_array($result2);
					$tipo_maq = $fila2[1];

					//Verificar si este modelo esta en la temporal. Para mostrar boton quitar
					$q5="select * FROM solicitud_temp,temporal_maquinaria,modelo_maquinaria WHERE solicitud_temp.codigo=codigo_temp AND codigo_maq=modelo_maquinaria.codigo AND modelo_maquinaria.codigo=$codigo_modelo";
					$result5 = mysqli_query($conectar,$q5);
					$cantidad5 = mysqli_num_rows($result5);
			?>
					<div class="maq">
						<img src="imagen_maquinaria/<?php echo $foto; ?>">
						<p><span>Modelo:</span> <?php echo htmlentities($modelo); ?></p>
						<p><span>Tipo:</span> <?php echo htmlentities($tipo_maq); ?></p>
						<p><span>Precio por dia:</span> <?php echo $precio_aql; ?></p>
						<p><span>Mora:</span> <?php echo $precio_mora; ?></p>
						<p><span>Precio Traslado:</span> <?php echo $precio_tras; ?></p>
						<p><span>Cantidad:</span> <?php echo $cantidad_modelo; ?></p>
						<?php if($cantidad5==0){ ?>

								<?php if($cantidad_modelo>0){ ?>

										<div id="espacio_btn">
											<form method="post" action="php/agregar_temporal.php">
												<input type="hidden" value="<?php echo $codigo_modelo; ?>" name="cod_modelo">
												<button class="btn" type="submit">Agregar</button>
											</form>
										</div>
										
								<?php } // fin if cantidad_modelo>0 ?>

						<?php }else{ ?>
								<div id="espacio_btn">
									<form method="post" action="php/quitar_temporal.php">
										<input type="hidden" value="<?php echo $codigo_modelo; ?>" name="cod_modelo">
										<button id="btn_quitar" class="btn" type="submit">Quitar</button>
									</form>
								</div>
						<?php } // fin if cantidad5 ?>
						<div class="clear"></div>
					</div>

			<?php } // fin ciclo for ?>
		</div>
		<?php

			//Revisar solicitud temporal
			$q3="select * from solicitud_temp where cod_cliente=$cod_cliente_sesion";
			$result3 = mysqli_query($conectar,$q3);
			$cantidad3 = mysqli_num_rows($result3);
			$cant_items_sol = 0;

			if($cantidad3>0){
				//Tiene solicitud temporal. Obtener items de esa solicitud
				$fila3 = mysqli_fetch_array($result3);
				$cod_sol_temp = $fila3[0];

				$q4="select * from temporal_maquinaria where codigo_temp=$cod_sol_temp";
				$result4 = mysqli_query($conectar,$q4);
				$cantidad4 = mysqli_num_rows($result4);
				$cant_items_sol = $cantidad4;
			}
		?>
		<a href="php/ir-a-solicitud.php">
			<div id="icono_flotante" onmouseover="document.getElementById('ayuda_flotante').style.display = 'block'" onmouseout="document.getElementById('ayuda_flotante').style.display = 'none'">
				<img src="images/icono_solicitud.png">
			</div>
			<div id="texto_flotante" onmouseover="document.getElementById('ayuda_flotante').style.display = 'block'" onmouseout="document.getElementById('ayuda_flotante').style.display = 'none'">
				<p><?php echo $cant_items_sol; ?></p>
			</div>
		</a>
		<div id="ayuda_flotante">
			<p>Generar solicitud</p>
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