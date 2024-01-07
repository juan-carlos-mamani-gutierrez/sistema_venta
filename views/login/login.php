<!-- <div id="back"></div> -->
<div class="login-page">
  <div class="login-box">

    <div class="card card-outline card-primary">

      <div class="card-header text-center">
        <img src="public/dist/img/logo_don.png" alt="logo" class="img-fluid img-thumbnail img-circle estilo_logo ">
      </div>
      <div class="card-body">
        <p class="login-box-msg estilo_loginParrafo">Ingresar al Sistema</p>
        <form method="post">
          <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Usuario" name="ingUsuario" required>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-user"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="password" class="form-control" placeholder="Contrasena" name="ingPassword" required>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <div class="row">


            <div class="col-12">
              <button type="submit" class="btn btn-primary btn-block ">Ingresar</button>
            </div>


          </div>

          <?php
          $login = new ControllersUsuarios();
          $login->ctrIngresoUsuario();
          ?>
        </form>



      </div>

    </div>

  </div>
</div>