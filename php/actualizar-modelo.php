<?php
	include_once('conectar.php');

	$cod_modelo = $_POST['cod_modelo'];
	$modelo = $_POST['modelo'];
	$cod_tipo = $_POST['cod_tipo'];
	$precio = $_POST['precio'];
	$mora = $_POST['mora'];
	$precio_tras = $_POST['precio_tras'];

	$q="update modelo_maquinaria set modelo='$modelo',cod_tipo=$cod_tipo,precio_alq=$precio,precio_mora=$mora,precio_tras=$precio_tras where codigo=$cod_modelo";
	$result = mysqli_query($conectar,$q);

	echo "<script type='text/javascript'>alert('Registro Actualizado');</script>";
	echo "<script type='text/javascript'>location.href='../administrador-modelo-maquinaria.php#m$cod_modelo'</script>";

?>