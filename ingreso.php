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
			<h2>INGRESO</h2>
			<hr>
			<p>Ingrese con su cuenta de usuario para acceder al panel de cliente desde donde podra ver la maquinaria disponible y generar las solicitudes de la misma de manera rapida y sencilla, asegurando el correcto desarrollo de su proyecto.</p>
		</div>

		<div id="ingreso">
			<form method="post" action="php/ingreso_usuario.php">
				<table border="2">
					<tr>
						<th>Usuario</th>
						<th><input type="text" name="usuario" class="caja"></th>
					</tr>
					<tr>
						<th>Clave</th>
						<th><input type="password" name="clave" class="caja"></th>
					</tr>
					<tr>
						<th colspan="2"><input type="submit" value="Ingresar" class="btn"></th>
					</tr>
				</table>
			</form>

			<p>
				¿No tienes usuario?. Registrate <a href="registro.php">aqui</a>
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

    	
    	
            