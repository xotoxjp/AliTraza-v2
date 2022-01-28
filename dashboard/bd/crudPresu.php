<?php
include_once '../../bd/conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();
// Recepción de los datos enviados mediante POST desde el JS   


$opcion = (isset($_POST['opcion'])) ? $_POST['opcion'] : '';
$id = (isset($_POST['id'])) ? $_POST['id'] : '';

switch($opcion){
    case 1: //confirmar
        
        $consulta = "UPDATE presupuestos SET estado=2 WHERE id_presupuesto='$id' ";
        //echo $consulta;
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        
        
        $consulta = "SELECT COUNT(`id_tipo_analisis`) as cantAnalisis FROM `tipo_analisis`";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $cant_analisis=$resultado->fetchColumn(0);
        

        $consulta = "SELECT cantidad FROM presupuestos WHERE id_presupuesto='$id' ";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $cantMuestras=$resultado->fetchColumn(0);

        $tipo_analisis_id = $cant_analisis;
        if($cantMuestras>0 && $cant_analisis>0){
            while($cantMuestras>0){
                //repetir por cant_analisis
                while($tipo_analisis_id>0){
                    $consulta = "INSERT INTO analisis (`id_presupuesto`,`id_tipo_analisis`,muestra)VALUES ('$id','$tipo_analisis_id','$cantMuestras')";
                    $tipo_analisis_id--;
                    $resultado = $conexion->prepare($consulta);
                    $resultado->execute();
                }
                $tipo_analisis_id = $cant_analisis;                
                $cantMuestras--;
                //echo $consulta;
                
            }
        }        
        $data="0";                            
        break;       
    case 3: //desestimar
        $consulta = "UPDATE presupuestos SET estado=0 WHERE id_presupuesto='$id' ";
        //echo $consulta;
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data="0";                          
        break;        
}

print json_encode($data, JSON_UNESCAPED_UNICODE); //enviar el array final en formato json a JS
$conexion = NULL;
