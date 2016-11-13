<?php
	include_once('conectar.php');
	include_once('sesiones.php');
	$cod_modelo = $_POST['cod_modelo'];

	//obtener numero de solicitud temporal asociada a ese cliente
	$q="select * from solicitud_temp where cod_cliente=$cod_cliente_sesion";
	$result = mysqli_query($conectar,$q);
	$fila = mysqli_fetch_array($result);
	$num_sol_temp = $fila[0];

	//Eliminar el item de solicitud temporal
	$q2="delete from temporal_maquinaria where codigo_temp=$num_sol_temp and codigo_maq=$cod_modelo";
	$result2 = mysqli_query($conectar,$q2);

	//Verificar si quedan mas items
	$q3 = "select * from temporal_maquinaria where codigo_temp=$num_sol_temp";
	$result3 =mysqli_query($conectar,$q3);
	$cantidad3 = mysqli_num_rows($result3);

	if($cantidad3==0){
		//Solicitud sin items. Eliminar solicitud temporal
		$q4 ="delete from solicitud_temp where codigo=$num_sol_temp";
		$result4 = mysqli_query($conectar,$q4);
	}

	echo "<script type='text/javascript'>location.href='../cliente-maquinaria.php';</script>";

?>