<?php
class ControllersUsuarios
{

  /* TODO Ingresar usuario */

  static public function ctrIngresoUsuario()
  {
    if (isset($_POST["ingUsuario"]) && !empty($_POST["ingUsuario"])) {
      /* TODO lo que va a resivir */
      if (
        preg_match('/^[a-zA-Z0-9]+$/', $_POST["ingUsuario"]) &&
        preg_match('/^[a-zA-Z0-9]+$/', $_POST["ingPassword"])
      ) {
        $encriptar = crypt($_POST['ingPassword'], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');

        $tabla = "usuarios";
        $item = "usuario";
        $valor = $_POST["ingUsuario"];


        $respuesta = ModelsUsuarios::mdlMostrarUsuarios($tabla, $item, $valor);

        if (
          is_array($respuesta) &&
          $respuesta["usuario"] == $_POST["ingUsuario"]  &&
          $respuesta["password"] == $encriptar
        ) {

          $_SESSION["iniciarSesion"] = "ok";
          $_SESSION['id'] = $respuesta['id'];
          $_SESSION['nombre'] = $respuesta['nombre'];
          $_SESSION['usuario'] = $respuesta['usuario'];
          $_SESSION['foto'] = $respuesta['foto'];
          $_SESSION['perfil'] = $respuesta['perfil'];


          echo '<script> 
                   window.location = "inicio";
                </script>';
        } else {


          echo '<div class="estilo_error">
                    <strong>ACCESO DENEGADO</strong> 
                </div>';
        }
      }
    }
  }
  /* TODO mostrar todos los usuarios */
  static public function ctrMostrarUsuarios($item, $valor)
  {
    $tabla = "usuarios";
    $respuesta = ModelsUsuarios::mdlMostrarUsuarios($tabla, $item, $valor);
    return $respuesta;
  }
  /* TODO ingresar todos los usurios */
  static public function ctrCrearUsuario()
  {
    if (isset($_POST["nuevoUsuario"])) {
      // TODO nombre puede llevar tildes y usuario y contrasena no
      if (
        preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoNombre"])  &&
        preg_match('/^[a-zA-Z0-9]+$/', $_POST["nuevoUsuario"]) &&
        preg_match('/^[a-zA-Z0-9]+$/', $_POST["nuevoPassword"])
      ) {
        // TODO validar imagen 

        // Verificar si se ha subido correctamente la imagen
        if (isset($_FILES["nuevaFoto"]["tmp_name"]) && is_uploaded_file($_FILES["nuevaFoto"]["tmp_name"])) {
          // Crear el directorio si no existe
          $directorio = "public/img/usuarios/" . $_POST["nuevoUsuario"];

          if (!file_exists($directorio)) {
            mkdir($directorio, 0755, true);
          }

          // Obtener información de la imagen
          list($ancho, $alto) = getimagesize($_FILES["nuevaFoto"]["tmp_name"]);
          $nuevoAncho = 500;
          $nuevoAlto = 500;

          // Generar ruta de la imagen con extensión dinámica
          $extension = pathinfo($_FILES["nuevaFoto"]["name"], PATHINFO_EXTENSION);
          $ruta = $directorio . "/" . mt_rand(100, 999) . "." . $extension;

          // Procesar la imagen
          try {
            if ($extension == "jpg" || $extension == "jpeg") {
              // Procesar para JPEG
              $origen = imagecreatefromjpeg($_FILES["nuevaFoto"]["tmp_name"]);
            } elseif ($extension == "png") {
              // Procesar para PNG
              $origen = imagecreatefrompng($_FILES["nuevaFoto"]["tmp_name"]);
            } else {
              // Extension de archivo no permitida
              throw new Exception("Tipo de archivo no permitido");
            }

            // Crear imagen redimensionada
            $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);
            imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

            // Guardar la imagen
            if ($extension == "jpg" || $extension == "jpeg") {
              imagejpeg($destino, $ruta);
            } elseif ($extension == "png") {
              imagepng($destino, $ruta);
            }

            // Liberar recursos
            imagedestroy($origen);
            imagedestroy($destino);
          } catch (Exception $e) {
            // Manejar errores
            echo "Error al procesar la imagen: " . $e->getMessage();
            exit;
          }
        }

        // TODO datos que vamos a ingresar ingresar datos 

        $tabla = "usuarios";

        $encriptar = crypt($_POST['nuevoPassword'], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');

        $datos = array(
          'nombre' => $_POST['nuevoNombre'],
          'usuario' => $_POST['nuevoUsuario'],
          'password' => $encriptar,
          'perfil' => $_POST['nuevoPerfil'],
          'foto' => $ruta
        );
        $respuesta = ModelsUsuarios::mdlIngresarUsuario($tabla, $datos);

        if ($respuesta == "ok") {
          echo '<script>
                    Swal.fire({
                        position: "center",
                        icon: "success",
                        title: "¡El usuario ha sido guardado correctamente!",
                        showConfirmButton: true,
                        confirmButtonColor: "#28a745",
                        confirmButtonText: "Cerrar"
                    }).then((result) => {
                        if (result.value) {
                            window.location = "usuarios"
                        }
                    });
				</script>';
        } else {
          echo '<script>

                    Swal.fire({
                       
                        icon: "error",
                        title: "Ocurrió un Error",
                        text: "Fallo base de datos!",
                        confirmButtonColor: "#d33",
                        confirmButtonText: "Cerrar"
                    }).then((result) => {
                        if (result.value) {
                            window.location = "usuarios"
                        }
                    });
                </script>';
        }
        echo '$respuesta';
      } else {
        echo '<script>

                Swal.fire({
                   
                    icon: "error",
                    title: "Ocurrió un Error",
                    text: "El usuario no puede ir vacío o llevar caracteres especiales!",
                    confirmButtonColor: "#d33",
                    confirmButtonText: "Cerrar"
                }).then((result) => {
                    if (result.value) {
                        window.location = "usuarios"
                    }
                });
            </script>';
      }
    }
  }
}
