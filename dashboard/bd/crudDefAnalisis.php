<?php
include_once '../../bd/conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();
// Recepción de los datos enviados mediante POST desde el JS   


$nomenclador = (isset($_POST['nomenclador'])) ? $_POST['nomenclador'] : ''; 
$detalle = (isset($_POST['detalle'])) ? $_POST['detalle'] : '';
$unidad = (isset($_POST['unidad'])) ? $_POST['unidad'] : '';
$limite_inferior = (isset($_POST['limite_inferior'])) ? $_POST['limite_inferior'] : '';
$limite_superior = (isset($_POST['limite_superior'])) ? $_POST['limite_superior'] : '';
$aplica_rechazo = (isset($_POST['aplica_rechazo'])) ? $_POST['aplica_rechazo'] : '';

$opcion = (isset($_POST['opcion'])) ? $_POST['opcion'] : '';
$id = (isset($_POST['id'])) ? $_POST['id'] : '';


switch($opcion){
    case 1: //alta
        $consulta = "INSERT INTO tipo_analisis (`nomenclador`,`detalle`,`unidad`,`limite_inferior`,`limite_superior`,`rechazo`) VALUES ('$nomenclador','$detalle','$unidad','$limite_inferior','$limite_superior','$aplica_rechazo')";
        //echo $consulta;
        $resultado = $conexion->prepare($consulta);
        $resultado->execute(); 

        $consulta = "SELECT `id_tipo_analisis` as id,`nomenclador`,`detalle`,`unidad`,`limite_inferior`,`limite_superior`,`rechazo`as aplica_rechazo FROM `tipo_analisis` ORDER BY id_tipo_analisis DESC LIMIT 1";
        //echo $consulta;
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        break;
    case 2: //modificación
        $consulta = "UPDATE tipo_analisis SET nomenclador='$nomenclador',detalle='$detalle',unidad='$unidad',limite_inferior='$limite_inferior',limite_superior='$limite_superior',rechazo='$aplica_rechazo' WHERE id_tipo_analisis='$id' ";		
        //echo $consulta;
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();        

        $consulta = "SELECT `id_tipo_analisis` as id,`nomenclador`,`detalle`,`unidad`,`limite_inferior`,`limite_superior`,`rechazo`as aplica_rechazo FROM `tipo_analisis` WHERE id_tipo_analisis='$id'  ";       
        //echo $consulta;
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        //echo $data;
        break;        
    case 3: //baja
        $consulta = "DELETE FROM tipo_analisis WHERE id_tipo_analisis='$id' ";
        //echo $consulta;
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data="0";                        
        break;
}

print json_encode($data, JSON_UNESCAPED_UNICODE); //enviar el array final en formato json a JS
$conexion = NULL;
