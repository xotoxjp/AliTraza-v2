
    <?php if($_SESSION["s_tipo"]=="admin" ){ ?>;
      <!-- Heading -->
      <div class="sidebar-heading">
        Administración
      </div>

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link" href="usuarios.php">
          <i class="fas fa-fw fa-key"></i>
          <span>Usuarios</span>
        </a>      
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

    <?php } ?>





      <!-- MODULO 2 -->   
    <?php if($_SESSION["s_tipo"]=="compras" || $_SESSION["s_tipo"]=="admin"){ ?>;    

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
          <i class="fas fa-fw fa-cart-arrow-down"></i>
          <span>Compras</span>
        </a>
        <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Acciones:</h6>
            <a class="collapse-item" href="productores.php">Productores</a>
            <a class="collapse-item" href="compras.php">Planilla de Compras</a>
            <a class="collapse-item" href="confirmacion.php">Confirmación</a>
          </div>
        </div>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">
    <?php } ?>



      <!-- MODULO 3 -->   
    <?php if($_SESSION["s_tipo"]=="laboratorio" || $_SESSION["s_tipo"]=="admin"){ ?>;    

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseFour" aria-expanded="true" aria-controls="collapseFour">
          <i class="fas fa-fw fa-flask"></i>
          <span>Laboratorio</span>
        </a>
        <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Acciones:</h6>
            <a class="collapse-item" href="analisis.php">Análisis</a>
            <a class="collapse-item" href="definicion.php">Definición Análisis</a>
          </div>
        </div>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">
    <?php } ?>



      <!-- MODULO 4 -->   
    <?php if($_SESSION["s_tipo"]=="logistica" || $_SESSION["s_tipo"]=="admin"){ ?>; 
      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseFive" aria-expanded="true" aria-controls="collapseFour">
          <i class="fas fa-fw fa-cubes"></i>
          <span>Logística</span>
        </a>
        <div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Acciones:</h6>
            <a class="collapse-item" href="#">Estado Pedido</a> <!-- href="estado.php" -->
            <a class="collapse-item" href="#">Envío Almacenes</a> <!-- href="almacenes.php" -->
          </div>
        </div>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">
    <?php } ?>


      <!-- MODULO 5 -->   
    <?php if($_SESSION["s_tipo"]=="ventas" || $_SESSION["s_tipo"]=="admin"){ ?>; 
      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseSix" aria-expanded="true" aria-controls="collapseSix">
          <i class="fas fa-fw fa-chart-bar"></i>
          <span>Ventas</span>
        </a>
        <div id="collapseSix" class="collapse" aria-labelledby="headingSix" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Acciones:</h6>
            <a class="collapse-item" href="#">Planilla Exportación</a> <!-- href="exportar.php" -->
            <a class="collapse-item" href="#">Estado Exportación</a>  <!-- href="exportado.php" -->
            <a class="collapse-item" href="#">Clientes</a>      <!-- href="clientes.php" -->
          </div>
        </div>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">
    <?php } ?>