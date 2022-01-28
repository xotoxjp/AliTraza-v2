<?php
include_once '../../bd/conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();
// Recepción de los datos enviados mediante POST desde el JS   

$nomenclador = (isset($_POST['nomenclador'])) ? $_POST['nomenclador'] : '';
$valor = (isset($_POST['valor'])) ? $_POST['valor'] : '';

$opcion = (isset($_POST['opcion'])) ? $_POST['opcion'] : '';
$id = (isset($_POST['id'])) ? $_POST['id'] : '';


switch($opcion){
    case 2: //modificación
        $consulta = "SELECT rechazo FROM tipo_analisis WHERE nomenclador='$nomenclador' ";
        //echo $consulta;
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $aplica_rechazo=$resultado->fetchColumn(0);
        
        $consulta = "SELECT limite_inferior FROM tipo_analisis WHERE nomenclador='$nomenclador' ";
        //echo $consulta;
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $inferior=$resultado->fetchColumn(0);

        $consulta = "SELECT limite_superior FROM tipo_analisis WHERE nomenclador='$nomenclador' ";
        //echo $consulta;
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $superior=$resultado->fetchColumn(0);
        
        
        
        //echo "<script>console.log('Debug Objects: " . $aplica_rechazo . "' );</script>";
        //echo "<script>console.log('Debug Objects: " . $inferior . "' );</script>";
        //echo "<script>console.log('Debug Objects: " . $superior . "' );</script>";
        

        if($aplica_rechazo == "Si"){
            if($valor<$inferior){
                $rechazo="Debajo del Limite";
            }else if($valor>$superior){
                $rechazo="Superior al Limite";
            }else{
                $rechazo="Aprobado";
            }
        }

        $consulta = "UPDATE analisis SET valor='$valor',rechazo='$rechazo' WHERE id_analisis='$id' ";		
        //echo $consulta;
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();        
 
        $consulta = "SELECT `id_analisis`AS id, presupuestos.num_presupuesto AS presupuesto, tipo_analisis.nomenclador, muestra,valor,analisis.rechazo AS resultado FROM analisis INNER JOIN presupuestos ON analisis.id_presupuesto = presupuestos.id_presupuesto INNER JOIN tipo_analisis ON analisis.id_tipo_analisis = tipo_analisis.id_tipo_analisis WHERE id_analisis='$id' ";
        //echo $consulta;
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        //echo $data;
        break;        
    case 3: //baja
        $consulta = "UPDATE analisis SET rechazo='RECHAZADO' WHERE id_analisis='$id' ";
        //echo $consulta;
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data="0";                        
        break;
}

print json_encode($data, JSON_UNESCAPED_UNICODE); //enviar el array final en formato json a JS
$conexion = NULL;
