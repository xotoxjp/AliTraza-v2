<?php require_once "../dashboard/vistas/parte_superior.php"?>

<!--INICIO del cont principal-->
<div class="container">
    <h1>Productores</h1>
    <?php
        include_once '../bd/conexion.php';
        $objeto = new Conexion();
        $conexion = $objeto->Conectar();
        $consulta = "SELECT `prod_id`, `razon_social`,`direccion`,`localidad`,`provincia`,`pais`,`cond_iva`,`nro_cuit`,`tel`,`cel`,`email`,`contacto` FROM productores";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
    ?>
</div>

<div class="container">
    <div class="row">
        <div class="col-lg-12">            
            <button id="btnNuevoProductor" type="button" class="btn btn-success" data-toggle="modal">Nuevo</button>    
        </div>    
    </div>    
</div>


<br>  

<div class="container">
    <div class="row">
        <div class="col-lg-12">

            <div class="table-responsive">   
                <table id="tablaProductores" class="table table-striped table-bordered table-condensed" style="width:100%">
                    <thead class="text-center">
                        <tr>  
                            <th>Id</th>
                            <th>Razón Social</th>
                            <th>Dirección</th>
                            <th>Localidad</th> 
                            <th>Provincia</th>
                            <th>País</th>                                 
                            <th>Condición IVA</th>
                            <th>CUIT</th>
                            <th>Teléfono</th>
                            <th>Celular</th>
                            <th>E-Mail</th>
                            <th>Contacto</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php                            
                        foreach($data as $datp) {                                                        
                        ?>
                        <tr>                  
                        <td><?php echo $datp['prod_id'] ?></td>
                        <td><?php echo $datp['razon_social'] ?></td>
                        <td><?php echo $datp['direccion'] ?></td>
                        <td><?php echo $datp['localidad'] ?></td> 
                        <td><?php echo $datp['provincia'] ?></td> 
                        <td><?php echo $datp['pais'] ?></td> 
                        <td><?php echo $datp['cond_iva'] ?></td> 
                        <td><?php echo $datp['nro_cuit'] ?></td> 
                        <td><?php echo $datp['tel'] ?></td> 
                        <td><?php echo $datp['cel'] ?></td> 
                        <td><?php echo $datp['email'] ?></td> 
                        <td><?php echo $datp['contacto'] ?></td>    
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
    <div class="modal fade" id="modalCRUDProd" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="formProductor">    
                    <div class="modal-body">
                        <div class="form-row">
                            <label for="prodid" class="col-form-label">ID:</label>
                            <input type="text" class="form-control" id="prodid" readonly>
                        </div>
                        <div class="form-row">
                            <label for="razonsocial" class="col-form-label">Razón Social:</label>
                            <input type="text" class="form-control" id="razonsocial">
                        </div>
                        <div class="form-row">
                            <label for="direccion" class="col-form-label">Direccion:</label>
                            <input type="text" class="form-control" id="direccion">
                        </div>                        
                        <div class="form-row">
                            <div class="col">
                            <label for="localidad" class="col-form-label">Localidad:</label>
                            <input type="text" class="form-control" id="localidad">
                            </div>
                            <div class="col">
                            <label for="provincia" class="col-form-label">Provincia:</label>
                            <input type="text" class="form-control" id="provincia">
                            </div>
                            <div class="col">
                            <label for="pais" class="col-form-label">País:</label>
                            <input type="text" class="form-control" id="pais">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col">
                            <label for="condicion" class="col-form-label">Condición IVA:</label>
                            <input type="text" class="form-control" id="condicion">
                            </div>
                            <div class="col">
                            <label for="cuit" class="col-form-label">CUIT:</label>
                            <input type="text" class="form-control" id="cuit">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col">
                            <label for="telefono" class="col-form-label">Teléfono:</label>
                            <input type="text" class="form-control" id="telefono">
                            </div>
                            <div class="col">
                            <label for="celular" class="col-form-label">Celular:</label>
                            <input type="text" class="form-control" id="celular">
                            </div>
                            <div class="col">
                            <label for="mail" class="col-form-label">E-Mail:</label>
                            <input type="text" class="form-control" id="mail">
                            </div>
                        </div>
                        <div class="form-row">
                            <label for="contacto" class="col-form-label">Contacto:</label>
                            <input type="text" class="form-control" id="contacto">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-dismiss="modal">Cancelar</button>
                        <button type="submit" id="btnGuardarProd" class="btn btn-dark">Guardar</button>
                    </div>
                </form>    
            </div>
        </div>
    </div>  




</div>
<!--FIN del cont principal-->

<?php require_once "../dashboard/vistas/parte_inferior.php"?>