<?php
class coneccion{
  //la clase de PDO conecciona  la BD
  public function getConneccion(){
    $usuario = "root";//el usurio
    $contraseña = "";//la contraseña
    $hostName = "localhost";//el nombre del host
    $baseDeDatos = "ad";//la base de getDatos
    $coneccion = new PDO("mysql:host=$hostName;dbname=$baseDeDatos;", $usuario, $contraseña);
    return $coneccion;
  }
}
?>
