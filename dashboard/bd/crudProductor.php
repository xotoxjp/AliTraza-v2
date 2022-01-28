<?php
include_once '../../bd/conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();
// Recepción de los datos enviados mediante POST desde el JS   


$razonsocial = (isset($_POST['razonsocial'])) ? $_POST['razonsocial'] : ''; 
$direccion = (isset($_POST['direccion'])) ? $_POST['direccion'] : '';
$localidad = (isset($_POST['localidad'])) ? $_POST['localidad'] : '';
$provincia = (isset($_POST['provincia'])) ? $_POST['provincia'] : '';
$pais = (isset($_POST['pais'])) ? $_POST['pais'] : '';
$condicion = (isset($_POST['condicion'])) ? $_POST['condicion'] : '';
$cuit = (isset($_POST['cuit'])) ? $_POST['cuit'] : '';
$telefono = (isset($_POST['telefono'])) ? $_POST['telefono'] : '';
$celular = (isset($_POST['celular'])) ? $_POST['celular'] : '';
$mail = (isset($_POST['mail'])) ? $_POST['mail'] : '';
$contacto = (isset($_POST['contacto'])) ? $_POST['contacto'] : '';
$opcion = (isset($_POST['opcion'])) ? $_POST['opcion'] : '';
$id = (isset($_POST['id'])) ? $_POST['id'] : '';

switch($opcion){
    case 1: //alta
        $consulta = "INSERT INTO productores (razon_social,direccion,localidad,provincia,pais,cond_iva,nro_cuit,tel,cel,email,contacto) VALUES ('$razonsocial','$direccion','$localidad','$provincia','$pais','$condicion','$cuit','$telefono','$celular','$mail','$contacto')";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute(); 

        $consulta = "SELECT prod_id,razon_social,direccion,localidad,provincia,pais,cond_iva,nro_cuit,tel,cel,email,contacto FROM productores ORDER BY prod_id DESC LIMIT 1";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        break;
    case 2: //modificación
        $consulta = "UPDATE productores SET direccion='$direccion',localidad='$localidad',provincia='$provincia',pais='$pais',cond_iva='$condicion',nro_cuit='$cuit',tel='$telefono',cel='$celular',email='$mail',contacto='$contacto' WHERE razon_social='$razonsocial' ";		
        //echo $consulta;
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();        

        $consulta = "SELECT prod_id,razon_social,direccion,localidad,provincia,pais,cond_iva,nro_cuit,tel,cel,email,contacto FROM productores WHERE razon_social='$razonsocial'  ";       
        //echo $consulta;
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        //echo $data;
        break;        
    case 3: //baja
        $consulta = "DELETE FROM productores WHERE prod_id='$id' ";
        //echo $consulta;
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data="0";                        
        break;
}

print json_encode($data, JSON_UNESCAPED_UNICODE); //enviar el array final en formato json a JS
$conexion = NULL;
