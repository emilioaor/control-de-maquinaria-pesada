<?php
	include_once("conectar.php");
	$usuario = $_POST['usuario'];
	$clave = $_POST['clave'];
	$q="select * from usuario where usuario='$usuario' and clave='$clave'";
	$result = mysqli_query($conectar,$q);
	$cantidad = mysqli_num_rows($result);
	session_start();
	if($cantidad>0){
		//sesiones de datos de usuario
		$fila = mysqli_fetch_array($result);
		$cod_usuario = $fila[0];
		$_SESSION['login'] = 'true';
		$_SESSION['usuario'] = $fila[0];
		$cod_nivel =  $fila[2];
		if($cod_nivel==1){
			//Administrador
			echo "<script type='text/javascript'>location.href='../administrador.php';</script>";
		}elseif($cod_nivel==2){
			//Encargado
			echo "<script type='text/javascript'>location.href='../encargado.php';</script>";
		}elseif($cod_nivel==3){
			//Cliente
			//sesiones de datos de cliente
			$q2 = "select * from cliente where usuario='$cod_usuario'";
			$result2 = mysqli_query($conectar,$q2);
			$fila2 = mysqli_fetch_array($result2);
			$_SESSION['cod_cliente'] = $fila2[0];
			$_SESSION['cedula'] = $fila2[1];
			$_SESSION['nombre'] = $fila2[2];
			$_SESSION['empresa'] = $fila2[3];
			$_SESSION['telefono'] = $fila2[4];
			$_SESSION['correo'] = $fila2[5];
			$_SESSION['direccion'] = $fila2[6];
			
			echo "<script type='text/javascript'>location.href='../cliente.php';</script>";
		}
	}else{
		//error en datos de inicio de sesion
		echo "<script type='text/javascript'>alert('Error en datos de inicio de sesion');</script>";
		echo "<script type='text/javascript'>location.href='../ingreso.php';</script>";
		//include_once('cerrar_sesion.php');
	}
?>