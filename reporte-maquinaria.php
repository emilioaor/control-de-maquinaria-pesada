<?php
	require('fpdf.php');
	include_once('php/conectar.php');

	$placa = $_POST['placa'];

	$dia1 = $_POST['dia1'];
	$mes1 = $_POST['mes1'];
	$ano1 = $_POST['ano1'];
	$dia2 = $_POST['dia2'];
	$mes2 = $_POST['mes2'];
	$ano2 = $_POST['ano2'];

	$fecha1 = $dia1.'-'.$mes1.'-'.$ano1;
	$fecha2 = $dia2.'-'.$mes2.'-'.$ano2;

	$fecha1b = date('Y-m-d',strtotime($fecha1) );
	$fecha2b = date('Y-m-d',strtotime($fecha2) );

	$pdf = new FPDF('L','mm','A4');
	$pdf->AddPage();

	$pdf->SetFont('Arial','b',20);
	$pdf->Ln();
	$pdf->Cell(280,10,'Maquinaria Solicitada');
	$pdf->Image('images/logo.jpg',240,5,30,30);
	$pdf->Ln();
	$pdf->SetFont('Arial','b',12);
	$pdf->Cell(20,5,'Desde:');
	$pdf->SetFont('Arial','',12);
	$pdf->Cell(30,5,date('d-m-Y',strtotime($fecha1) ) );
	$pdf->Ln();
	$pdf->SetFont('Arial','b',12);
	$pdf->Cell(20,5,'Hasta:');
	$pdf->SetFont('Arial','',12);
	$pdf->Cell(30,5,date('d-m-Y',strtotime($fecha2) ) );
	$pdf->Ln();
	$pdf->Ln();
	$pdf->SetFont('Arial','b',12);
	$pdf->Cell(30,10,'Placa');
	$pdf->Cell(30,10,'Solicitud');
	$pdf->Cell(60,10,'Modelo');
	$pdf->Cell(60,10,'Tipo');
	$pdf->Cell(60,10,'Cliente');
	$pdf->Cell(40,10,'Fecha');
	$pdf->Ln();

	if($placa=='Todas'){
		//toda la maquinaria
		$q="select placa,solicitud.codigo,modelo,tipo,empresa,fecha FROM maquinaria,solicitud,solicitud_maquinaria,cliente,modelo_maquinaria,tipo_maquinaria WHERE cliente.codigo=cod_cliente AND solicitud.codigo=cod_sol AND placa=placa_maq AND modelo_maquinaria.codigo=cod_modelo AND tipo_maquinaria.codigo=cod_tipo AND (fecha>='$fecha1b' AND fecha<='$fecha2b') ORDER BY placa,solicitud.codigo DESC";
	
	}else{
		//Maquinaria especifica
		$q="select placa,solicitud.codigo,modelo,tipo,empresa,fecha FROM maquinaria,solicitud,solicitud_maquinaria,cliente,modelo_maquinaria,tipo_maquinaria WHERE cliente.codigo=cod_cliente AND solicitud.codigo=cod_sol AND placa=placa_maq AND modelo_maquinaria.codigo=cod_modelo AND tipo_maquinaria.codigo=cod_tipo AND placa='$placa' AND (fecha>='$fecha1b' AND fecha<='$fecha2b') ORDER BY placa,solicitud.codigo DESC";
	}

	$result= mysqli_query($conectar,$q);
	$cantidad = mysqli_num_rows($result);
	$pdf->SetFont('Arial','',12);
	for($x=1;$x<=$cantidad;$x++){
		$fila = mysqli_fetch_array($result);
		$placa = $fila[0];
		$solicitud = $fila[1];
		$modelo = $fila[2];
		$tipo = $fila[3];
		$cliente = $fila[4];
		$fecha = date('d-m-Y',strtotime($fila[5]));

		$pdf->Cell(30,10,"$placa");
		$pdf->Cell(30,10,"$solicitud");
		$pdf->Cell(60,10,"$modelo");
		$pdf->Cell(60,10,"$tipo");
		$pdf->Cell(60,10,"$cliente");
		$pdf->Cell(40,10,"$fecha");
		$pdf->Ln();
	}
	
	$pdf->Output();
?>