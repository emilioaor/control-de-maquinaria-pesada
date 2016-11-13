<?php
	include_once('conectar.php');

	$cod_solicitud = $_POST['cod_solicitud'];

	//cambiar estatus de la solicitud a : Aprobada
	$q="update solicitud set estatus='Aprobada' where codigo=$cod_solicitud";
	$result = mysqli_query($conectar,$q);

	//obtener Maquinaria asociada a la solicitud
	$q2 ="select placa FROM solicitud_maquinaria,maquinaria WHERE placa=placa_maq AND cod_sol=$cod_solicitud";
	$result2 = mysqli_query($conectar,$q2);
	$cantidad2 = mysqli_num_rows($result2);

	for($x=1;$x<=$cantidad2;$x++){
		$fila2 = mysqli_fetch_array($result2);
		$placa = $fila2[0];

		//Actualizar el estatus de la maquinaria asociada a la solicitud
		$q3 = "update maquinaria set estatus='Alquilada' where placa='$placa'";
		$result3 = mysqli_query($conectar,$q3);
	}

	echo "<script type='text/javascript'>alert('Solicitud Aprobada');</script>";
	echo "<script type='text/javascript'>location.href='../encargado-solicitud.php';</script>";

?>