<?php 
	$destino= "avd-miguel@hotmail.com";
	$nombre= $_POST["nombre"];
	$correo= $_POST["correo"];
	$telefono= $_POST["telefono"];
	$mensaje= $_POST["mensaje"];
	$contenido= '<html>
	<body>
    <img src="imagenes/logoheader.png" alt="" />
	<br>
	<h1> <i>MENSAJE DE LA WEB IARGROUP S.A.</i> </h1><br>
	<hr>	
	<br>
	<p> El visitante <strong><font style="text-transform: uppercase;">'.$nombre.'</font></strong>, te ha enviado el siguente mensaje:  </p>
	<p><strong><font style="text-transform: uppercase;">' .$mensaje. '</font></strong></p> 
	<p>Puedes responderle al correo: <strong>'.$correo.'</strong></p>
	</body>
	</html>';
	
	$encabezado= "MINE-vrsion:1.0\r\n";
	$encabezado.= "Content-type: text/html; charset=UTF-8\r\n";
	$encabezado.= "From: Web IARGROUP S.A. <no-reply@k2webhost.com>";
	
	
	mail($destino, "CONTACTO", $contenido, $encabezado);
    header("location:contacto.html");
?>