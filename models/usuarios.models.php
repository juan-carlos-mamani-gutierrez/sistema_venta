<?php

require_once 'config/conexion.php';

class ModelsUsuarios
{
  /* TODO mostrar y el ingreso  */
  static public function mdlMostrarUsuarios($tabla, $item, $valor)
  {
    if ($item != null) {
      /* TODO Ingreso de usuarios */
      $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");
      $stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);
      $stmt->execute();
      return $stmt->fetch();
    } else {
      /* TODO mostrar todos los usuarios */
      $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");
      $stmt->execute();
      return $stmt->fetchAll();
    }

    $stmt = null;
  }
  /* TODO ingresar un usuario */
  static public function mdlIngresarUsuario($tabla, $datos)
  {
    $stmt = Conexion::conectar()->prepare(
      "INSERT INTO $tabla(id, nombre, usuario, password, perfil,foto) VALUES (NULL,:nombre,:usuario, :password, :perfil,:foto)"
    );

    $stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
    $stmt->bindParam(":usuario", $datos["usuario"], PDO::PARAM_STR);
    $stmt->bindParam(":password", $datos["password"], PDO::PARAM_STR);
    $stmt->bindParam(":perfil", $datos["perfil"], PDO::PARAM_STR);
    $stmt->bindParam(":foto", $datos["foto"], PDO::PARAM_STR);

    if ($stmt->execute()) {
      return "ok";
    } else {
      return "error";
    }
    $stmt = null;
  }
}
