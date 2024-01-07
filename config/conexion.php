<?php
class Conexion
{

  /* TODO conexion a la base de datos */
  static public function conectar()
  {
    $link = new PDO("mysql:host=localhost;dbname=sisventa", "root", "");
    $link->exec("set names utf8");
    return $link;
  }
}
