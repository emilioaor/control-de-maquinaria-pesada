<?php
	include_once('conectar.php');

	$cod_solicitud = $_POST['cod_solicitud'];

	//cambiar estatus de la solicitud a : Completa
	$q="update solicitud set estatus='Completa' where codigo=$cod_solicitud";
	$result = mysqli_query($conectar,$q);

	//obtener Maquinaria asociada a la solicitud
	$q2 ="select placa FROM solicitud_maquinaria,maquinaria WHERE placa=placa_maq AND cod_sol=$cod_solicitud";
	$result2 = mysqli_query($conectar,$q2);
	$cantidad2 = mysqli_num_rows($result2);

	for($x=1;$x<=$cantidad2;$x++){
		$fila2 = mysqli_fetch_array($result2);
		$placa = $fila2[0];

		//Actualizar el estatus de la maquinaria asociada a la solicitud
		$q3 = "update maquinaria set estatus='Disponible' where placa='$placa'";
		$result3 = mysqli_query($conectar,$q3);
	}

	//hacer el conteo de maquinaria
	$q4 = "select * FROM modelo_maquinaria";
	$result4 = mysqli_query($conectar,$q4);
	$cantidad4 = mysqli_num_rows($result4);

	for($x=1;$x<=$cantidad4;$x++){
		$fila4 = mysqli_fetch_array($result4);
		$codidgo_modelo = $fila4[0];

		//obtener cantidad para cada modelo
		$q5 = "select * FROM maquinaria WHERE cod_modelo=$codidgo_modelo and estatus='Disponible'";
		$result5 = mysqli_query($conectar,$q5);
		$cantidad5 = mysqli_num_rows($result5);

		//Actualizar el registro del modelo de maquinaria con la cantidad actualizada
		$q6 = "update modelo_maquinaria set cantidad=$cantidad5 where codigo=$codidgo_modelo";
		$result6 = mysqli_query($conectar,$q6);

	}

	echo "<script type='text/javascript'>alert('Solicitud Recibida');</script>";
	echo "<script type='text/javascript'>location.href='../administrador-solicitudes.php';</script>";

?>