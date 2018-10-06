<?php
require_once('coneccion.php');
//gusrdamos los valores de la funcion en variables
$id = $_POST['id'];
//eliminamos la imagen
$resultado = mysqli_query($coneccion, "DELETE from imagenproductos WHERE numeroIMG='$id' ");
//evaluamos la eliminacion
if ($resultado) {
  header("Location: editor3cargaImagenes.php");
}
else{
  echo "ERROR [105], contacte al soporte tecnico";
}
?>
