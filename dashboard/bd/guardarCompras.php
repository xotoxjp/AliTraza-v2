<?php
include_once '../../bd/conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();
// Recepción de los datos enviados mediante POST desde el JS   


$fechaCompra = (isset($_POST['fechaCompra'])) ? $_POST['fechaCompra'] : ''; 
$presupuesto = (isset($_POST['presupuesto'])) ? $_POST['presupuesto'] : '';
$productor = (isset($_POST['productor'])) ? $_POST['productor'] : '';
$cantidad = (isset($_POST['cantidad'])) ? $_POST['cantidad'] : '';


$consulta = "INSERT INTO `presupuestos`(`num_presupuesto`, `productor`, `fecha`, `cantidad`,`estado`) VALUES ($presupuesto,'$productor','$fechaCompra',$cantidad,1)";
//echo $consulta;
$resultado = $conexion->prepare($consulta);
$resultado->execute(); 

//print json_encode($data, JSON_UNESCAPED_UNICODE); //enviar el array final en formato json a JS
$conexion = NULL;