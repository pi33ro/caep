<?php
require_once "../capa_conexion/conexion.php";
require_once "../capa_logica/crudNotadecargo.php";
$obj = new crudNotadecargo();

$datos = array(

	$_POST['idusu'], //0
	$_POST['idcargo'], //1
	$_POST['ncestado'], //2
	$_POST['ncpeticion'], //3
	$_POST['nccontrata'], //4
	$_POST['ncfechaliq'], //5
	$_POST['ncnunasignado'], //6
	$_POST['ncejecutivotdp'], //7
	$_POST['nczonaltdp'], //8
	$_POST['nccomentarioback'], //9
	$_POST['nccasosf'], //10
	$_POST['ncnodo'], //11
	$_POST['ncfinanciera'], //12
	$_POST['ncfe'], //13
	$_POST['ncdireccion2'], //14
	$_POST['nccoordenadas2'] //15
);

try {
	$resultado = $obj->agregarncfBack($datos);
	echo json_encode($resultado);
	print_r($datos);
} catch (Exception $exc) {
	header("HTTP/1.1 500");
	echo $exc->getMessage();
}
