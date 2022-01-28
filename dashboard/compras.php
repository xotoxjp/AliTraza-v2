<?php require_once "../dashboard/vistas/parte_superior.php"?>


<?php
    include_once '../bd/conexion.php';
    $objeto = new Conexion();
    $conexion = $objeto->Conectar();

    $consulta = "SELECT razon_social as productor FROM productores";
    $resultado = $conexion->prepare($consulta);
    $resultado->execute();
    $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
?>

<!--INICIO del cont principal-->
<div class="container">
    <h1>Compra de Materia Prima</h1>
    <br><br>
    <form action="" id="formcompras">
        <div class="form-row">
            <div class="col">
                <label for="fechaCompra" class="col-form-label">Fecha</label>
                <input type="date" class="form-control" id="fechaCompra">
            </div>
            <div class="col">
                <label for="presupuesto" class="col-form-label">Número Presupuesto:</label>
                <input type="number" class="form-control" id="presupuesto">
            </div>
        </div>
        <div class="form-row">
            <div class="col">
                <label for="productor" class="col-form-label">Productor:</label>
                <select class="form-control" id="productor">
                    <?php 
                        foreach($data as $dat) {
                    ?>
                    <option><?php echo $dat['productor'] ?></option>
                    <?php
                        }
                    ?> 
                </select>
            </div>
            <div class="col">
                <label for="cantidad" class="col-form-label">Cantidad:</label>
                <input type="number" class="form-control" id="cantidad">
            </div>         
        </div>
        <div class="modal-footer">
            <button type="button" id="btnCancel" class="btn btn-light">Cancelar</button>
            <button type="submit" id="btnGuardar" class="btn btn-dark">Guardar</button>
        </div>
    </form>
</div>
<!--FIN del cont principal-->

<?php require_once "../dashboard/vistas/parte_inferior.php"?>