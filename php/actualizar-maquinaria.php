<?php
	include_once('conectar.php');

	$placa = $_POST['placa'];
	$cod_modelo = $_POST['cod_modelo'];

	//actualizar registro de maquinaria
	$q ="update maquinaria set cod_modelo=$cod_modelo where placa='$placa'";
	$result = mysqli_query($conectar,$q);

	//hacer el conteo de maquinaria
	$q2 = "select * FROM modelo_maquinaria";
	$result2 = mysqli_query($conectar,$q2);
	$cantidad2 = mysqli_num_rows($result2);

	for($x=1;$x<=$cantidad2;$x++){
		$fila2 = mysqli_fetch_array($result2);
		$codidgo_modelo = $fila2[0];

		//obtener cantidad para cada modelo
		$q3 = "select * FROM maquinaria WHERE cod_modelo=$codidgo_modelo and estatus='Disponible'";
		$result3 = mysqli_query($conectar,$q3);
		$cantidad3 = mysqli_num_rows($result3);

		//Actualizar el registro del modelo de maquinaria con la cantidad actualizada
		$q4 = "update modelo_maquinaria set cantidad=$cantidad3 where codigo=$codidgo_modelo";
		$result4 = mysqli_query($conectar,$q4);

	}

	//despedida
	echo "<script type='text/javascript'>alert('Maquinaria Actualizada');</script>";
	echo "<script type='text/javascript'>location.href='../administrador-maquinaria.php#$placa';</script>";

?>