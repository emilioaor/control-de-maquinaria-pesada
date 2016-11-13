<?php
	session_start();
	unset($_SESSION['login']);
	unset($_SESSION['usuario']);
	unset($_SESSION['cod_cliente']);
	unset($_SESSION['cedula']);
	unset($_SESSION['nombre']);
	unset($_SESSION['empresa']);
	unset($_SESSION['telefono']);
	unset($_SESSION['correo']);
	unset($_SESSION['direccion']);

	echo "<script type='text/javascript'>location.href='../ingreso.php';</script>";
?>