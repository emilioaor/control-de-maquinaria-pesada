<?php
	session_start();
	$login_sesion = $_SESSION['login'];
	$usuario_sesion = $_SESSION['usuario'];
	$cod_cliente_sesion = $_SESSION['cod_cliente'];
	$cedula_sesion = $_SESSION['cedula'];
	$nombre_sesion = $_SESSION['nombre'];
	$empresa_sesion = $_SESSION['empresa'];
	$telefono_sesion = $_SESSION['telefono'];
	$correo_sesion = $_SESSION['correo'];
	$direccion_sesion = $_SESSION['direccion'];

	if($login_sesion != 'true'){
		echo "<script type='text/javascript'>alert('Debe ingresar primero');</script>";
		echo "<script type='text/javascript'>location.href='ingreso.php';</script>";
	}
?>