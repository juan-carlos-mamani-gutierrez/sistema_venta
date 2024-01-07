<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="inicio" class="brand-link">
    <img src="public/dist/img/logo_don.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">DON BARATON</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <?php
        if ($_SESSION["foto"] != "") {
          echo '<img src="' . $_SESSION["foto"] . '" class="img-circle elevation-2" alt="User Image">';
        } else {

          echo '<img src="public/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">';
        }
        ?>

      </div>
      <div class="info">
        <a href="#" class="d-block"><?= $_SESSION["nombre"] ?></a>
      </div>
    </div>

    <!-- SidebarSearch Form -->
    <div class="form-inline">
      <div class="input-group" data-widget="sidebar-search">
        <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-sidebar">
            <i class="fas fa-search fa-fw"></i>
          </button>
        </div>
      </div>
    </div>

    <!--TODO Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">


        <li class="nav-item">
          <a href="inicio" class="nav-link">
            <i class="nav-icon fas fa-home"></i>
            <p>
              Inicio

            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="usuarios" class="nav-link">
            <i class="nav-icon fas fa-user"></i>
            <p>
              Usuarios

            </p>
          </a>
        </li>

        <li class="nav-item">
          <a href="categorias" class="nav-link">
            <i class="nav-icon fas fa-tasks"></i>
            <p>
              Categorias

            </p>
          </a>
        </li>

        <li class="nav-item">
          <a href="productos" class="nav-link">
            <i class="nav-icon fas fa-tshirt"></i>
            <p>
              Productos

            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="clientes" class="nav-link">
            <i class="nav-icon fas fa-users"></i>
            <p>
              Clientes

            </p>
          </a>
        </li>
        <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-chart-line"></i>
            <p>
              Ventas
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="ventas" class="nav-link">
                <i class="far fa-dot-circle nav-icon"></i>
                <p>Administrar ventas</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="crear-venta" class="nav-link">
                <i class="far fa-dot-circle nav-icon"></i>
                <p>Crear venta</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="reportes" class="nav-link">
                <i class="far fa-dot-circle nav-icon"></i>
                <p>Reporte de ventas</p>
              </a>
            </li>
          </ul>
        </li>

        <li class="nav-item">
          <a href="salir" class="nav-link">
            <i class="nav-icon fas fa-users"></i>
            <p>
              salir

            </p>
          </a>
        </li>

      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>