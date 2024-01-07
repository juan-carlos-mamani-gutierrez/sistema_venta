/* TODO: subit foto de usuario */

$(".nuevaFoto").change(function () {
  var imagen = this.files[0];

  // TODO: validar formato de  la imagen

  if (imagen["type"] != "image/jpeg" && imagen["type"] != "image/png") {
    $(".nuevaFoto").val("");

    Swal.fire({
      icon: "error",
      title: "Error al Subir la Imagen",
      text: "La Imagen debe estar en Formato JPG o PNG!",
      confirmButtonColor: "#d33",
      confirmButtonText: "Cerrar",
    });
  } else if (imagen["size"] > 2000000) {
    $(".nuevaFoto").val("");

    Swal.fire({
      icon: "error",
      title: "Error al Subir la Imagen",
      text: "La Imagen NO debe pesar mas 2MB!",
      confirmButtonColor: "#d33",
      confirmButtonText: "Cerrar",
    });
  } else {
    var datosImagen = new FileReader();
    datosImagen.readAsDataURL(imagen);
    $(datosImagen).on("load", function (event) {
      var rutaImagen = event.target.result;
      $(".previsualizar").attr("src", rutaImagen);
    });
  }
});

/* document.querySelector(".nuevaFoto").addEventListener("change", function () {
  const imagen = this.files[0];

  // TODO Validar formato de la imagen
  if (imagen["type"] !== "image/jpeg" && imagen["type"] !== "image/png") {
    this.value = "";

    Swal.fire({
      icon: "error",
      title: "Error al Subir la Imagen",
      text: "La Imagen debe estar en Formato JPG o PNG!",
      confirmButtonColor: "#d33",
      confirmButtonText: "Cerrar",
    });
    // TODO Validar tamaño de la imagen (2MB)
  } else if (imagen["size"] > 2000000) {
    this.value = "";

    Swal.fire({
      icon: "error",
      title: "Error al Subir la Imagen",
      text: "La Imagen NO debe pesar más de 2MB!",
      confirmButtonColor: "#d33",
      confirmButtonText: "Cerrar",
    });
  } else {
    const datosImagen = new FileReader();
    datosImagen.onload = function (event) {
      const rutaImagen = event.target.result;
      document.querySelector(".previsualizar").src = rutaImagen;
    };
    datosImagen.readAsDataURL(imagen);
  }
}); */

// TODO Editar usuario

/* $(document).on("click", ".btnEditarUsuario", function(){

	var idUsuario = $(this).attr("idUsuario");
	
	var datos = new FormData();
	datos.append("idUsuario", idUsuario);

	$.ajax({

		url:"ajax/usuarios.ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
		success: function(respuesta){
			
			$("#editarNombre").val(respuesta["nombre"]);
			$("#editarUsuario").val(respuesta["usuario"]);
			$("#editarPerfil").html(respuesta["perfil"]);
			$("#editarPerfil").val(respuesta["perfil"]);
			$("#fotoActual").val(respuesta["foto"]);

			$("#passwordActual").val(respuesta["password"]);

			if(respuesta["foto"] != ""){

				$(".previsualizar").attr("src", respuesta["foto"]);

			}

		}

	});

}) */
