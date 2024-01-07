<?php
session_start();
?>

<!DOCTYPE html>

<html lang="es">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Don Baraton</title>

  <?php
  include 'HTML/head.php';
  ?>
</head>

<body class="hold-transition layout-fixed sidebar-mini  sidebar-collapse">


  <?php
  if (isset($_SESSION["iniciarSesion"]) && $_SESSION["iniciarSesion"] == "ok") {


    print '<div class="wrapper">';
    include 'HTML/navbar.php';
    include 'HTML/menu.php';
  ?>

    <?php
    if (isset($_GET["ruta"])) {
      /* TODO opciones */
      if (
        $_GET["ruta"] == "inicio" ||
        $_GET["ruta"] == "usuarios" ||
        $_GET["ruta"] == "categorias" ||
        $_GET["ruta"] == "productos" ||
        $_GET["ruta"] == "clientes" ||
        $_GET["ruta"] == "ventas" ||
        $_GET["ruta"] == "crear-venta" ||
        $_GET["ruta"] == "reportes" ||
        $_GET["ruta"] == "salir"
      ) {
        include $_GET["ruta"] . "/" . $_GET["ruta"] . ".php";
      } else {
        include "error404/error404.php";
      }
    } else {

      include "inicio/inicio.php";
    }
    ?>

    <!-- Control Sidebar -->

    <!--  <aside class="control-sidebar control-sidebar-dark">
  
      <div class="p-3">
        <h5>Title</h5>
        <p>Sidebar content</p>
      </div>
    </aside> -->

  <?php
    /* TODO footer */

    print '</div>';
    include 'Html/footer.php';
  } else {
    /* TODO login */
    include 'login/login.php';
  }
  ?>



  <!-- TODO src js -->

  <?php
  include 'HTML/js.php'
  ?>





  <script>
    $(".tablas").DataTable({
      "bDestroy": true,
      "responsive": true,
      "lengthChange": true,
      "autoWidth": false,
      "bInfo": true,
      "language": {
        "sProcessing": "Procesando...",
        "sLengthMenu": "Mostrar _MENU_ registros",
        "sZeroRecords": "No se encontraron resultados",
        "sEmptyTable": "Ningún dato disponible en esta tabla",
        "sInfo": "Mostrando un total de _TOTAL_ registros",
        "sInfoEmpty": "Mostrando un total de 0 registros",
        "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
        "sInfoPostFix": "",
        "sSearch": "Buscar:",
        "sUrl": "",
        "sInfoThousands": ",",
        "sLoadingRecords": "Cargando...",
        "oPaginate": {
          "sFirst": "Primero",
          "sLast": "Último",
          "sNext": "Siguiente",
          "sPrevious": "Anterior",
        },
        "oAria": {
          "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
          "sSortDescending": ": Activar para ordenar la columna de manera descendente",
        },
      }
    });
  </script>
  <script>
    function enable() {
      Swal.fire({

        icon: "error",
        title: "Ocurio un Error",
        text: "El usuario no puede ir vacío o llevar caracteres especiales!",
        confirmButtonColor: "#d33",
        confirmButtonText: "Cerrar"
      }).then((result) => {
        if (result.value) {
          window.location = "usuarios"
        }
      });
    }
  </script>
  <script src="public/js/usuarios.js"></script>
</body>

</html>