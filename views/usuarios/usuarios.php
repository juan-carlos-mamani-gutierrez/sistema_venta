<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Administrar Usuarios</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="inicio">Inicio</a></li>
            <li class="breadcrumb-item active">Administrar Usuarios</li>
          </ol>
        </div>
      </div>
    </div>
  </div>


  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <!-- TODO agregar un nuevo usuario -->
              <div class=" p-3">
                <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarUsuario">
                  Agregar Usuario
                </button>
              </div>
              <div class=" p-3">
                <button class="btn btn-primary" onclick="enable()">
                  modal
                </button>
              </div>
            </div>

            <!-- /.card-header -->
            <div class="card-body">
              <!-- TODO tabla -->
              <table class="table table-bordered table-striped tablas">
                <thead>
                  <tr>
                    <th style="width:10px">#</th>
                    <th>Nombre</th>
                    <th>Usuario</th>
                    <th>Foto</th>
                    <th>Perfil</th>
                    <th>Estado</th>
                    <th>Ultimo Login</th>
                    <th>Acciones</th>
                  </tr>
                </thead>
                <tbody>

                  <?php
                  /* TODO llamando a controladores */
                  $item = null;
                  $valor = null;
                  $usuario = ControllersUsuarios::ctrMostrarUsuarios($item, $valor);
                  /* TODO for para mostrar los datos  */
                  foreach ($usuario as $value) {

                  ?>
                    <tr>
                      <td><?= $value['id'] ?></td>
                      <td><?= $value['nombre'] ?></td>
                      <td><?= $value['usuario'] ?></td>
                      <?php
                      if ($value['foto'] != "") {
                        echo '<td><img src="' . $value["foto"] . '" alt="foto" class="img-thumbnail" width="40px"></td>';
                      } else {
                        echo ' <td><img src="public/img/usuarios/default/anonymous.png" alt="foto" class="img-thumbnail" width="40px"></td>';
                      }
                      ?>

                      <td><?= $value['perfil'] ?></td>
                      <td><button class="btn btn-success btn-xs">activo</button></td>
                      <td><?= $value['ultimo_login'] ?></td>
                      <td>
                        <div class="btn-group">
                          <button class="btn btn-warning btnEditarUsuario" idUsurio="'<?= $value["id"] ?>'" data-toggle="modal" data-target="#modalEditarUsuario"><i class="fa fa-user-edit"></i></button>
                          <button class="btn btn-danger mx-2"><i class="fa fa-trash-alt"></i></button>
                        </div>
                      </td>
                    </tr>

                  <?php } ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>

<?php
include 'modalNuevoUsuriario.php';

?>