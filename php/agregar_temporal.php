<?php
	include_once('conectar.php');
	include_once('sesiones.php');
	$cod_modelo = $_POST['cod_modelo'];
	//consultar si existe solicitud temporal
	$q="select * from solicitud_temp where cod_cliente=$cod_cliente_sesion";
	$result = mysqli_query($conectar,$q);
	$cantidad = mysqli_num_rows($result);

	if($cantidad==0){
		//agregar solicitud temporal
		$q2="insert into solicitud_temp values(NULL,$cod_cliente_sesion)";
		$result2 = mysqli_query($conectar,$q2);
	}
	
	//obtener numero de solicitud temporal asociada a ese cliente
	$q3="select * from solicitud_temp where cod_cliente=$cod_cliente_sesion";
	$result3 = mysqli_query($conectar,$q3);
	$fila3 = mysqli_fetch_array($result3);
	$num_sol_temp = $fila3[0];

	//Agregar el modelo a lo solicitud temporal
	$q4 = "insert into temporal_maquinaria values($num_sol_temp,$cod_modelo)";
	$result4 = mysqli_query($conectar,$q4);

	echo "<script type='text/javascript'>location.href='../cliente-maquinaria.php';</script>";
?>