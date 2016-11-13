<?php
	include_once('conectar.php');
	include_once('sesiones.php');

	$cod_sol_temp = $_POST['cod_sol_temp'];
	$descripcion = $_POST['descripcion'];
	$direccion = $_POST['direccion'];

	//insertar solicitud
	$q2 = "insert into solicitud values(NULL,'$descripcion',$cod_cliente_sesion,'$direccion',NOW(),0,'Pendiente')";
	$result2 = mysqli_query($conectar,$q2);

	//obtener el codigo de la ultima solicitud
	$q3 = "select * from solicitud where cod_cliente=$cod_cliente_sesion order by codigo desc";
	$result3 = mysqli_query($conectar,$q3);
	$fila3 = mysqli_fetch_array($result3);
	$cod_solicitud = $fila3[0];

	//Obtener items de la solicitud temporal
	$q="select * FROM solicitud_temp,temporal_maquinaria,modelo_maquinaria WHERE solicitud_temp.codigo=codigo_temp AND codigo_maq=modelo_maquinaria.codigo AND solicitud_temp.codigo=$cod_sol_temp";
	$result = mysqli_query($conectar,$q);
	$cantidad = mysqli_num_rows($result);

	for($x=1;$x<=$cantidad;$x++){
		$fila = mysqli_fetch_array($result);
		$cod_modelo = $fila[3];

		$cantidad_modelo = $_POST['c'.$x];
		$dias_modelo = $_POST['d'.$x];
		$traslado = $_POST['r'.$x];

		//obtener lista de maquinas con ese modelo
		$q4 = "select * from maquinaria where estatus='Disponible' and cod_modelo=$cod_modelo";
		$result4 = mysqli_query($conectar,$q4);
		$cantidad4 = mysqli_num_rows($result4);

		//obtener datos del modelo
		$q5 ="select * from modelo_maquinaria where codigo=$cod_modelo";
		$result5 = mysqli_query($conectar,$q5);
		$fila5 = mysqli_fetch_array($result5);
		$precio_alq = $fila5[3];
		$precio_mora = $fila5[4];
		$cant_modelo_actual= $fila5[5];
		//verificar si necesita traslado
		if($traslado=='SI'){
			//obtener precio del traslado
			$precio_tras = $fila5[7]; 	
		}else{
			//mantener en 0
			$precio_tras = 0;
		}

		if($cantidad_modelo>$cantidad4) $cantidad_modelo= $cantidad4; 

		for($y=1;$y<=$cantidad_modelo;$y++){
			//obtener placa de maquina
			$fila4 = mysqli_fetch_array($result4);
			$placa = $fila4[0];

			//Insertar la maquina en los item de la solicitud real
			$q6 ="insert into solicitud_maquinaria values($cod_solicitud,'$placa',$precio_alq,$precio_mora,$dias_modelo,$precio_tras)";
			$result6 = mysqli_query($conectar,$q6);

			//Cambiar el estatus de la maquina
			$q7 ="update maquinaria set estatus='Reservada' where placa='$placa'";
			$result7 = mysqli_query($conectar,$q7);

			//disminuir la cantidad de maquinas disponibles para ese modelo
			$cant_modelo_actual--;
			$q8 ="update modelo_maquinaria set cantidad=$cant_modelo_actual where codigo=$cod_modelo";
			$result8 = mysqli_query($conectar,$q8);
		}
	}

	//Eliminar registros items de la solicitud temporal
	$q9 ="delete from temporal_maquinaria where codigo_temp=$cod_sol_temp";
	$result9 = mysqli_query($conectar,$q9);

	//eliminar registro de la solicitud temporal
	$q10 ="delete from solicitud_temp where codigo=$cod_sol_temp";
	$result10 = mysqli_query($conectar,$q10);

	//calcular el valor de la solicitud real
	$q11 = "select precio_alq,dias,precio_tras FROM solicitud,solicitud_maquinaria WHERE codigo=cod_sol AND codigo=$cod_solicitud";
	$result11 = mysqli_query($conectar,$q11);
	$cantidad11 =mysqli_num_rows($result11);
	$total = 0;

	for($x=1;$x<=$cantidad11;$x++){
		$fila11 = mysqli_fetch_array($result11);
		$p = $fila11[0];
		$d = $fila11[1];
		$t = $fila11[2];
		$subtotal = $p * $d + $t;
		$total+= $subtotal;
	}

	//actualizar el monto de la solicitud
	$q12 ="update solicitud set total=$total where codigo=$cod_solicitud";
	$result12 = mysqli_query($conectar,$q12);

	echo "<script type='text/javascript'>alert('Solicitud Generada');</script>";
	echo "<script type='text/javascript'>location.href='../cliente.php';</script>";

?>