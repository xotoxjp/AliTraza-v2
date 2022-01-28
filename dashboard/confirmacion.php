<?php require_once "../dashboard/vistas/parte_superior.php"?>

<?php
    include_once '../bd/conexion.php';
    $objeto = new Conexion();
    $conexion = $objeto->Conectar();

    $consulta = "SELECT DISTINCT num_presupuesto as presupuesto FROM presupuestos WHERE estado=1 ORDER BY num_presupuesto ASC";
    $resultado = $conexion->prepare($consulta);
    $resultado->execute();
    $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
?>

<!--INICIO del cont principal-->
<div class="container">
    <h1>Confirmación de Presupuestos</h1>
    <br><br>
    <form action="mostrarPresupuesto.php" method="post" id="formSelectPresupuesto">
        <h3>Selección de Presupuesto</h3>
        <label for="presupuesto" class="col-form-label">Presupuesto N°:</label>
        <select class="form-control" id="presupuesto" name="presupuesto">
            <?php 
                foreach($data as $dat) {
            ?>
            <option><?php echo $dat['presupuesto'] ?></option>
            <?php
                }
            ?> 
        </select>
        <div class="modal-footer">
            <button type="button" id="btnCancel" class="btn btn-light">Cancelar</button>
            <button type="submit" id="btnAceptar" class="btn btn-dark">Aceptar</button>
        </div>
    </form>
</div>
<!--FIN del cont principal-->

<?php require_once "../dashboard/vistas/parte_inferior.php"?>