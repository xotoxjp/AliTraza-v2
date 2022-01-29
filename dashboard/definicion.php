<?php require_once "../dashboard/vistas/parte_superior.php"?>

<!--INICIO del cont principal-->
<div class="container">
    <h1>Definición de Análisis Laboratorio</h1>
    <?php
        include_once '../bd/conexion.php';
        $objeto = new Conexion();
        $conexion = $objeto->Conectar();
        
        $consulta = "SELECT `id_tipo_analisis` as id,`nomenclador`,`detalle`,`unidad`,`limite_inferior`,`limite_superior`,`rechazo` FROM `tipo_analisis` ";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
    ?>
</div>

<div class="container">
    <div class="row">
        <div class="col-lg-12">            
            <button id="btnNuevaDefAnalisis" type="button" class="btn btn-success" data-toggle="modal">Nueva Definición</button>    
        </div>    
    </div>    
</div>


<br>  

<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="table-responsive">   
                <table id="tablaDefAnalisis" class="table table-striped table-bordered table-condensed" style="width:100%">
                    <thead class="text-center">
                        <tr>  
                            <th>Id</th>
                            <th>Nomenclador</th>
                            <th>Detalle</th>
                            <th>Unidad</th> 
                            <th>Limite Inferior</th>
                            <th>Limite Superior</th>                                 
                            <th>Aplica Rechazo</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php                            
                        foreach($data as $datp) {                                                        
                        ?>
                        <tr>                  
                        <td><?php echo $datp['id'] ?></td>
                        <td><?php echo $datp['nomenclador'] ?></td>
                        <td><?php echo $datp['detalle'] ?></td>
                        <td><?php echo $datp['unidad'] ?></td> 
                        <td><?php echo $datp['limite_inferior'] ?></td> 
                        <td><?php echo $datp['limite_superior'] ?></td> 
                        <td><?php echo $datp['rechazo'] ?></td>  
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
    <div class="modal fade" id="modalCRUDTipoAnalisis" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="formTipoAnalisis">    
                    <div class="modal-body">
                        <div class="form-row">
                            <label for="analisisdefid" class="col-form-label">ID:</label>
                            <input type="text" class="form-control" id="analisisdefid" readonly>
                        </div>
                        <div class="form-row">
                            <label for="nomenclador" class="col-form-label">Nomenclador:</label>
                            <input type="text" class="form-control" id="nomenclador">
                        </div>
                        <div class="form-row">
                            <label for="detalle" class="col-form-label">Detalle:</label>
                            <input type="text" class="form-control" id="detalle">
                        </div>
                        <div class="form-row">
                            <label for="unidad" class="col-form-label">Unidad:</label>
                            <input type="text" class="form-control" id="unidad">                    
                        </div>                        
                        <div class="form-row">
                            <div class="col">
                            <label for="limite_inferior" class="col-form-label">Limite Inferior:</label>
                            <input type="number" class="form-control" id="limite_inferior" step=".0001">
                            </div>
                            <div class="col">
                            <label for="limite_superior" class="col-form-label">Limite Superior:</label>
                            <input type="number" class="form-control" id="limite_superior" step=".0001">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col">
                            <label for="aplica_rechazo" class="col-form-label">Aplica Rechazo:</label>
                            <select class="form-control" id="aplica_rechazo">
                                <option>Si</option>
                                <option>No</option>
                            </select>
                            </div>
                        </div>
                
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-dismiss="modal">Cancelar</button>
                        <button type="submit" id="btnGuardarTA" class="btn btn-dark">Guardar</button>
                    </div>
                </form>    
            </div>
        </div>
    </div>

</div>
<!--FIN del cont principal-->

<?php require_once "../dashboard/vistas/parte_inferior.php"?>