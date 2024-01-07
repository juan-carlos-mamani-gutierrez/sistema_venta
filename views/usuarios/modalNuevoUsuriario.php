<!-- TODO  modal de Agregar usuario  -->

<div class="modal fade" id="modalAgregarUsuario" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <form role="form" method="post" enctype="multipart/form-data">

        <div class="modal-header" style="background:#007bff;">
          <h5 class="modal-title" id="mdltitulo">Agregar Usuario</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>


        <div class="modal-body">

          <!--      <input type="hidden" id="prod_id" name="prod_id"> -->
          <!-- TODO entrada para el nombre -->
          <div class="form-group">
            <label>Nombre</label>
            <input type="text" class="form-control input-lg" name="nuevoNombre" placeholder="Ingrese Nombre" required>
          </div>

          <!-- TODO entrada para el usuario -->
          <div class="form-group">
            <label>Usuario</label>
            <input type="text" class="form-control input-lg" name="nuevoUsuario" placeholder="Ingrese Usuario" required>
          </div>
          <!-- TODO entrada para el usuario -->
          <div class="form-group">
            <label>contraseña</label>
            <input type="password" class="form-control input-lg" name="nuevoPassword" placeholder="Ingrese Contraseña" required>
          </div>
          <!-- TODO perfil -->
          <div class="form-group">

            <label>Perfil</label>
            <select name="nuevoPerfil" class="form-control">
              <option value="">Selecionar Perfil</option>
              <option value="Administrador">Administrador</option>
              <option value="Especial">Especial</option>
              <option value="Vendedor">Vendedor</option>
            </select>

          </div>
          <!-- TODO entrada para foto -->

          <div class="form-group">
            <div class="panel">Subir Foto</div>
            <input type="file" class="nuevaFoto" name="nuevaFoto">
            <p class="help-block">Peso maximo de la foto 2mb</p>
            <img src="public/img/usuarios/default/anonymous.png" class="img-thumbnail previsualizar" width="100px" alt="foto">
          </div>
          <!-- TODO botones -->
          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Salir</button>
            <button type="submit" class="btn btn-primary">Guardar Usuario</button>
          </div>
          <?php
          $crearUsuario = new ControllersUsuarios();
          $crearUsuario->ctrCrearUsuario();
          ?>
        </div>
      </form>
      public\img\usuarios
    </div>
  </div>
</div>