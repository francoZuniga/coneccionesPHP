<?php
session_start();
require_once("coneccion.php");
//guardamos los datos en variables
$id = $_SESSION['id'];
$modelo = $_POST['modelo'];
$marca = $_POST['marca'];
$descripcion = $_POST['descripcion'];
//luego realizamos la actualizacion de los datos del producto
$actualizacion = mysqli_query($coneccion, "UPDATE fichaVariedad SET modelo = '$modelo', marca = '$marca',descripcion = '$descripcion' WHERE IdProductos= '$id'");
if ($actualizacion) {
  $_SESSION['pasos'] = "2";
  header("Location: paso3Editor.php");
}
else {
  echo "ERROR [107], contacte al soporte tecnico";
}
?>
