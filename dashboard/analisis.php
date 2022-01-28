<?php require_once "../dashboard/vistas/parte_superior.php"?>

<!--INICIO del cont principal-->
<div class="container">
    <h1>Análisis Laboratorio</h1>
    <?php
        include_once '../bd/conexion.php';
        $objeto = new Conexion();
        $conexion = $objeto->Conectar();
        
        //$consulta = "SELECT `id_tipo_analisis` as id,`nomenclador`,`detalle`,`unidad`,`limite_inferior`,`limite_superior`,`rechazo` FROM `tipo_analisis` ";
        //$consulta = "SELECT `id_analisis`,`id_presupuesto`,`id_tipo_analisis`,`muestra`,`valor`,`rechazo`FROM `analisis`";
        $consulta = "SELECT `id_analisis`AS id, presupuestos.num_presupuesto AS presupuesto, tipo_analisis.nomenclador, muestra,valor,analisis.rechazo AS resultado FROM analisis INNER JOIN presupuestos ON analisis.id_presupuesto = presupuestos.id_presupuesto INNER JOIN tipo_analisis ON analisis.id_tipo_analisis = tipo_analisis.id_tipo_analisis";

        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
    ?>
</div>

<!--
<div class="container">
    <div class="row">
        <div class="col-lg-12">            
            <button id="btnNuevaDefAnalisis" type="button" class="btn btn-success" data-toggle="modal">Nueva Definición</button>    
        </div>    
    </div>    
</div>
-->

<br>  

<div class="container">
    <div class="row">
        <div class="col-lg-12">

            <div class="table-responsive">   
                <table id="tablaAnalisis" class="table table-striped table-bordered table-condensed" style="width:100%">
                    <thead class="text-center">
                        <tr>  
                            <th>Id</th>
                            <th>Presupuesto</th>
                            <th>Muestra</th>
                            <th>Nomenclador</th>
                            <th>Valor</th>                                 
                            <th>Resultado</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php                            
                        foreach($data as $datp) {                                                        
                        ?>
                        <tr>                  
                        <td><?php echo $datp['id'] ?></td>
                        <td><?php echo $datp['presupuesto'] ?></td>
                        <td><?php echo $datp['muestra'] ?></td>
                        <td><?php echo $datp['nomenclador'] ?></td>
                        <td><?php echo $datp['valor'] ?></td>
                        <td><?php echo $datp['resultado'] ?></td>  
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


    <!--Modal para CRUD-->
    <div class="modal fade" id="modalCRUDAnalisis" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="formAnalisis">    
                    <div class="modal-body">
                        <div class="form-row">
                            <div class="col">
                                <label for="analisisid" class="col-form-label">ID:</label>
                                <input type="text" class="form-control" id="analisisid" readonly>
                            </div>
                            <div class="col">
                                <label for="muestranum" class="col-form-label">Muestra:</label>
                                <input type="text" class="form-control" id="muestranum" readonly>
                            </div>                            
                        </div>
                        <div class="form-row">
                            <div class="col">
                                <label for="nomenclador" class="col-form-label">Nomenclador:</label>
                                <input type="text" class="form-control" id="nomenclador" readonly>
                            </div>
                            <div class="col">
                                <label for="presupuesto" class="col-form-label">Presupuesto:</label>
                                <input type="text" class="form-control" id="presupuesto" readonly>                                
                            </div>
                        </div>
                        <div class="form-row">
                            <label for="valor" class="col-form-label">Valor Detectado:</label>
                            <input type="text" class="form-control" id="valor">                    
                        </div>                                      
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-dismiss="modal">Cancelar</button>
                        <button type="submit" id="btnGuardarA" class="btn btn-dark">Guardar</button>
                    </div>
                </form>    
            </div>
        </div>
    </div>  


</div>
<!--FIN del cont principal-->

<?php require_once "../dashboard/vistas/parte_inferior.php"?>