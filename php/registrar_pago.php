<?php
	
	include_once('conectar.php');

	$cod_trans = $_POST['cod_trans'];
	$monto_trans = $_POST['monto_trans'];
	$cod_banco = $_POST['banco'];
	$cod_solicitud = $_POST['cod_solicitud'];

	//registrar el pago
	$q="insert into pagos values (NULL,'$cod_trans',$cod_solicitud,$monto_trans,$cod_banco)";
	$result = mysqli_query($conectar,$q);
	
	//Cambiar estatus de la solicitud
	$q2 ="update solicitud set estatus='Por Aprobar' where codigo=$cod_solicitud";
	$result2 = mysqli_query($conectar,$q2);

	echo "<script type='text/javascript'>alert('Registro de pago enviado');</script>";
	echo "<script type='text/javascript'>location.href='../cliente.php';</script>";
?>