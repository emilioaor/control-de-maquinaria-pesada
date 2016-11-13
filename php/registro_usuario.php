<?php
	include_once('conectar.php');
	$usuario = $_POST['usuario'];
	$clave = $_POST['clave'];
	$reclave = $_POST['reclave'];
	$cedula = $_POST['cedula'];
	$nombre = $_POST['nombre'];
	$empresa = $_POST['empresa'];
	$telefono = $_POST['telefono'];
	$correo = $_POST['correo'];
	$direccion = $_POST['direccion'];
	$var_get = "?usuario=$usuario&cedula=$cedula&nombre=$nombre&empresa=$empresa&telefono=$telefono&correo=$correo&direccion=$direccion";

	if($clave == $reclave){
		//comprobar campos vacios
		if($usuario!='' && $clave!='' && $cedula!='' && $nombre!='' && $empresa!='' && $telefono!='' && $correo!='' && $direccion!=''){
			//verificar el nombre de usuario
			$qusuario = "select * from usuario where usuario='$usuario'";
			$resultusuario = mysqli_query($conectar,$qusuario);
			$cantidadusuario = mysqli_num_rows($resultusuario);
			if($cantidadusuario<1){
				//Hacer el registro

				//insertar usuario
				$q3 = "insert into usuario values('$usuario','$clave',3);";
				$result3 = mysqli_query($conectar,$q3);
				//insertar cliente
				$q = "insert into cliente values(NULL,'$cedula','$nombre','$empresa','$telefono','$correo','$direccion','$usuario')";
				$result = mysqli_query($conectar,$q);

				echo "<script type='text/javascript'>alert('Registro Completo');</script>";
				echo "<script type='text/javascript'>location.href='../ingreso.php'</script>";
			}else{
				//nombre de usuario repetido volver al registro
				echo "<script type='text/javascript'>alert('Este nombre de usuario ya esta siendo usado');</script>";
				$var_get = "?usuario=&cedula=$cedula&nombre=$nombre&empresa=$empresa&telefono=$telefono&correo=$correo&direccion=$direccion";
				echo "<script type='text/javascript'>location.href='../registro.php$var_get'</script>";
			}
		}else{
			//Existen campos vacios volver al registro
			echo "<script type='text/javascript'>alert('Debe llenar todos los campos')</script>";
			echo "<script type='text/javascript'>location.href='../registro.php$var_get'</script>";
		}
	}else{
		//diferentes claves volver al registro
		echo "<script type='text/javascript'>alert('Las dos claves deben ser iguales')</script>";
		echo "<script type='text/javascript'>location.href='../registro.php$var_get'</script>";
	}
?>