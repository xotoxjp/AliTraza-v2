<?php require_once "vistas/parte_superior.php"?>

<!--INICIO del cont principal-->
<div class="container">
    <h1>Usuarios</h1>  

    <?php
        include_once '../bd/conexion.php';
        $objeto = new Conexion();
        $conexion = $objeto->Conectar();

        $consulta = "SELECT * FROM usuarios";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
    ?>

    <!--div class="container">
        <div class="row">
            <div class="col-lg-12">            
                <button id="btnNuevoUs" type="button" class="btn btn-success" data-toggle="modal">Asignar</button>    
            </div>    
        </div>    
    </div-->

    <br>  
    
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="table-responsive">        
                    <table id="tablaUsuarios" class="table table-striped table-bordered table-condensed" style="width:100%">
                        <thead class="text-center">
                            <tr>
                                <th>Id</th>
                                <th>Usuarios</th>
                                <th>Password</th>                                
                                <th>Acceso</th>
                                <th>Acciones</th> 
                            </tr>
                        </thead>
                        <tbody>
                            <?php                            
                                foreach($data as $dat) {                                                        
                            ?>
                            <tr>
                                <td><?php echo $dat['id'] ?></td>
                                <td><?php echo $dat['usuario'] ?></td>
                                <td><?php echo $dat['password'] ?></td>
                                <td><?php echo $dat['tipo'] ?></td>    
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
    </div>    
        
    <!--Modal para CRUD-->
    <div class="modal fade" id="modalCRUD" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="formUsuarios">    
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="user" class="col-form-label">Usuario:</label>
                            <input type="text" class="form-control" id="user" readonly>
                        </div>              
                        <div class="form-group">
                            <label for="acceso" class="col-form-label">Acceso:</label>
                            <select class="form-control" id="acceso">
                                <option>admin</option>
                                <option>compras</option>
                                <option>laboratorio</option>
                                <option>logistica</option>
                                <option>ventas</option>
                            </select>
                        </div>            
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-dismiss="modal">Cancelar</button>
                        <button type="submit" id="btnGuardar" class="btn btn-dark">Guardar</button>
                    </div>
                </form>    
            </div>
        </div>
    </div>  
    
</div>
<!--FIN del cont principal-->
<?php require_once "vistas/parte_inferior.php"?>