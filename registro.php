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
<link rel="stylesheet" type="text/css" href="css/estilos_ingreso.css">
<!--slider-->
<link href="css/slider.css" rel="stylesheet" type="text/css" media="all"/>
<script type="text/javascript" src="js/jquery-1.9.0.min.js"></script>
<script type="text/javascript" src="js/jquery.nivo.slider.js"></script>
<script type="text/javascript">
    $(window).load(function() {
        $('#slider').nivoSlider();
    });
    </script>
    <?php  
    	$usuario = $_GET['usuario'];
		$cedula = $_GET['cedula'];
		$nombre = $_GET['nombre'];
		$empresa = $_GET['empresa'];
		$telefono = $_GET['telefono'];
		$correo = $_GET['correo'];
		$direccion = $_GET['direccion'];
    ?>
</head>
<body>

    <div class="header">	
      <nav>
         <ul>
            <li><a href="index.html"><span class="primero"><i class="icon icon-home"></i></span>INICIO</a></li>
            <li><a href="nosotros.html"><span class="segundo"><i class="icon icon-vcard"></i></span>QUIENES SOMOS</a></li>
            <li><a href="servicios.html"><span class="tercero"><i class="icon icon-info"></i></span>SERVICIO</a></li>
            <li><a href="proyectos.html"><span class="cuarto"><i class="icon icon-maletin"></i></span>PROYECTOS</a></li>
            <li><a href="ingreso.php"><span class="quinto"><i class="icon icon-edit"></i></span>INGRESO</a></li>
        </ul>
    </nav>	   
    </div>
     
  	<div class="main">
	 	<div class="titulos">
	 		<br>
			<h2>Registro</h2>
			<hr>
			<p>¿Desea solicitar nuestros servicios?. Primero es necesario que se registre en nuestra pagina web desde el siguiente formulario. Podra solicitar toda la maquinaria que necesite para el desarrollo de su proyecto.</p>
		</div>

		<div id="ingreso">
			<form method="post" action="php/registro_usuario.php">
				<table border="2">
					<tr>
						<th>Usuario</th>
						<th><input type="text" name="usuario" class="caja" value="<?php echo $usuario ?>"></th>
					</tr>
					<tr>
						<th>Clave</th>
						<th><input type="password" name="clave" class="caja"></th>
					</tr>
					<tr>
						<th>Repetir</th>
						<th><input type="password" name="reclave" class="caja"></th>
					</tr>
					<tr>
						<th>Cedula</th>
						<th><input type="text" name="cedula" class="caja" value="<?php echo $cedula ?>"></th>
					</tr>
					<tr>
						<th>Nombre</th>
						<th><input type="text" name="nombre" class="caja" value="<?php echo $nombre ?>"></th>
					</tr>
					<tr>
						<th>Empresa</th>
						<th><input type="text" name="empresa" class="caja" value="<?php echo $empresa ?>"></th>
					</tr>
					<tr>
						<th>Telefono</th>
						<th><input type="text" name="telefono" class="caja" value="<?php echo $telefono ?>"></th>
					</tr>
					<tr>
						<th>Correo</th>
						<th><input type="text" name="correo" class="caja" value="<?php echo $correo ?>"></th>
					</tr>
					<tr>
						<th>Direccion</th>
						<th><input type="text" name="direccion" class="caja" value="<?php echo $direccion ?>"></th>
					</tr>
					<tr>
						<th colspan="2"><input type="submit" value="Registrar" class="btn"></th>
					</tr>
				</table>
			</form>

			<p>
				¿Ya tienes cuenta de usuario?. Ingresa <a href="ingreso.php">aqui</a>
			</p>
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

    	
    	
            