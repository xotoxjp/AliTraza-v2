<?php require_once "vistas/parte_superior.php"?>

<!--INICIO del cont principal-->
<div class="container">
    <h1>Dashboard</h1>
    <?php
        include_once '../bd/conexion.php';
        $objeto = new Conexion();
        $conexion = $objeto->Conectar();

        $consulta = "SELECT count(*) FROM usuarios";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $cantUsers=$resultado->fetchColumn(0);

        $consulta = "SELECT count(*) FROM productores";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $cantProductores=$resultado->fetchColumn(0);
        
        $consulta = "SELECT count(DISTINCT num_presupuesto) FROM presupuestos";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $cantPresupuestos=$resultado->fetchColumn(0);

        $consulta = "SELECT count(*) FROM tipo_analisis";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $cantDefinicionAnalisis=$resultado->fetchColumn(0);

        $consulta = "SELECT count(*) FROM analisis";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $cantAnalizar=$resultado->fetchColumn(0);
    ?>

<!-- ###FILA 1-->
<div class="row">
    <div class="col-lg-6">
        <div class="card shadow mb-4">
            <!-- Card Header - Accordion -->
            <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
                <h6 class="m-0 font-weight-bold text-primary">Modulo de Compras</h6>
            </a>
            <!-- Card Content - Collapse -->
            <div class="collapse show" id="collapseCardExample">
                <div class="card-body">
                    Este módulo permite la asignación de Productores y Presupuestos.
                    <br><br>
                    <!-- Earnings (Monthly) Card Example -->                    
                    <div class="card border-left-info shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-info text-uppercase mb-1">cantidad de productores</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $cantProductores; ?></div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-address-card fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <!-- Earnings (Monthly) Card Example -->                    
                    <div class="card border-left-info shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-info text-uppercase mb-1">cantidad de presupuestos</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $cantPresupuestos; ?></div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-business-time fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-lg-6">
        <div class="card shadow mb-4">
            <!-- Card Header - Accordion -->
            <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
                <h6 class="m-0 font-weight-bold text-primary">Modulo de Laboratorio</h6>
            </a>
            <!-- Card Content - Collapse -->
            <div class="collapse show" id="collapseCardExample">
                <div class="card-body">
                    Este módulo permite la definición de Análisis de Laboratorio y Asignar los resultados de los análisis a cada muestra presupuestada.
                    <br><br>

                    <!-- Earnings (Monthly) Card Example -->                    
                    <div class="card border-left-success shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Análisis de Laboratorio</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $cantDefinicionAnalisis; ?></div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-vials fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <!-- Earnings (Monthly) Card Example -->                    
                    <div class="card border-left-success shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Cantidad de Muestras para Analizar</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $cantAnalizar; ?></div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-capsules fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- ###FILA 2-->
<div class="row">
<div class="col-lg-6">
        <div class="card shadow mb-4">
            <!-- Card Header - Accordion -->
            <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
                <h6 class="m-0 font-weight-bold text-primary">Modulo de Logística</h6>
            </a>
            <!-- Card Content - Collapse -->
            <div class="collapse show" id="collapseCardExample">
                <div class="card-body">
                    Este módulo permite definir el destino de las muestras y la gestión de almacenes.
                    <br><br>
                    
                    <!-- Earnings (Monthly) Card Example -->                    
                    <div class="card border-left-primary shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">cantidad de almacenes</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">2</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-warehouse fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>

                    <!-- Earnings (Monthly) Card Example -->                    
                    <div class="card border-left-primary shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">cantidad de envíos</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">10</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-boxes fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-lg-6">
        <div class="card shadow mb-4">
            <!-- Card Header - Accordion -->
            <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
                <h6 class="m-0 font-weight-bold text-primary">Modulo de Ventas</h6>
            </a>
            <!-- Card Content - Collapse -->
            <div class="collapse show" id="collapseCardExample">
                <div class="card-body">
                    Este módulo permite definir el destino de las ventas y la gestión de clientes.
                    <br><br>
                   
                    <!-- Earnings (Monthly) Card Example -->                    
                    <div class="card border-left-warning shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">cantidad de Clientes</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">1031</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-handshake fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <!-- Earnings (Monthly) Card Example -->                    
                    <div class="card border-left-warning shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">productos vendidos</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">2140</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-shopping-basket fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
        

        
 </div>




<!-- ###FILA 3-->
<div class="row">
    <div class="col-lg-6">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-danger">Modulo de Usuarios</h6>
        </div>
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Usuarios Registrados</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $cantUsers; ?></div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-child fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>
    </div>        
</div>


     

</div>  

<!--FIN del cont principal-->
<?php require_once "vistas/parte_inferior.php"?>