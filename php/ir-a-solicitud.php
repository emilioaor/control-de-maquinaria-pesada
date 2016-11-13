<?php
	include_once('conectar.php');
	include_once('sesiones.php');

	$q="select * from solicitud_temp where cod_cliente=$cod_cliente_sesion";
	$result = mysqli_query($conectar,$q);
	$cantidad = mysqli_num_rows($result);

	if($cantidad>0){
		//ir a la planilla de la solicitud
		echo "<script type='text/javascript'>location.href='../cliente-solicitud.php';</script>";
	}else{
		//volver a lista de maquinaria
		echo "<script type='text/javascript'>alert('Atencion. Primero debe seleccionar algun modelo de maquinaria de la lista');</script>";
		echo "<script type='text/javascript'>location.href='../cliente-maquinaria.php';</script>";
	}
?>