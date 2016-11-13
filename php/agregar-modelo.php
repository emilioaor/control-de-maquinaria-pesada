<?php
	include_once('conectar.php');

	$path="../imagen_maquinaria/";
	$archivo = basename($_FILES['imagen']['name']);
	$path=$path.$archivo;
	
	
	if(move_uploaded_file($_FILES['imagen']['tmp_name'],$path)){

		$modelo = $_POST['modelo'];
		$cod_tipo = $_POST['cod_tipo'];
		$precio = $_POST['precio'];
		$mora = $_POST['mora'];
		$precio_tras = $_POST['precio_tras'];
		$foto = $archivo;
		$q="insert into modelo_maquinaria values(NULL,'$modelo',$cod_tipo,$precio,$mora,0,'$foto',$precio_tras)";
		$result = mysqli_query($conectar,$q);

		echo "<script type='text/javascript' >alert('Modelo Registrado');</script>";
	}else{
		echo "<script type='text/javascript' >alert('Error al registrar modelo de maquinaria');</script>";	
	}

	echo "<script>location.href='../administrador-modelo-maquinaria.php'</script>";
?>