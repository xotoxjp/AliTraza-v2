<?php require_once "../dashboard/vistas/parte_superior.php"?>

<?php
    include_once '../bd/conexion.php';
    $objeto = new Conexion();
    $conexion = $objeto->Conectar();

    $presupuesto = (isset($_POST['presupuesto'])) ? $_POST['presupuesto'] : '';

    $consulta = "SELECT id_presupuesto as id,fecha,productor,cantidad FROM presupuestos WHERE num_presupuesto='$presupuesto' AND estado=1";
    
    $resultado = $conexion->prepare($consulta);
    $resultado->execute();
    $data=$resultado->fetchAll(PDO::FETCH_ASSOC);

    
?>

<!--INICIO del cont principal-->
<div class="container">
    <h1>Confirmación de Presupuestos</h1>
    <br><br>
    <h4>Presupuesto N° <?php echo $presupuesto ?></h4>
 
        <div class="row">
            <div class="col-lg-12">
                <div class="table-responsive">        
                    <table id="tablaPresupuestos" class="table table-striped table-bordered table-condensed" style="width:100%">
                        <thead class="text-center">
                            <tr>
                                <th>Id</th>
                                <th>Fecha</th>
                                <th>Productor</th>
                                <th>Cantidad</th> 
                                <th>Acciones</th>                               
                            </tr>
                        </thead>
                        <tbody>
                            <?php                            
                                foreach($data as $dat) {                                                        
                            ?>
                            <tr>
                                <td><?php echo $dat['id'] ?></td>    
                                <td><?php echo $dat['fecha'] ?></td>
                                <td><?php echo $dat['productor'] ?></td>
                                <td><?php echo $dat['cantidad'] ?></td>
                                <td></td> 
                            </tr>
                            <?php
                                }
                            ?>                                
                        </tbody>        
                    </table>                    
                </div>
            </div>
        </div>
        
        <div class="modal-footer">
            <button type="button" class="btn btn-light" data-dismiss="modal" onclick="$(location).attr('href','confirmacion.php');"  >Volver</button>
        </div>

</div>
<!--FIN del cont principal-->

<?php require_once "../dashboard/vistas/parte_inferior.php"?>