<?php
//conectamos la BD ademas de iniciar las sessiones
require_once('coneccion.php');
session_start();
//alamcenamos los datos en variables y escapamos los caracteres especiales
$id = $_POST['id'];
$id = mysqli_real_escape_string($coneccion, $id);
$nombre = $_POST['nombre'];
$nombre = mysqli_real_escape_string($coneccion, $nombre);
$precio = $_POST['precio'];
$precio = mysqli_real_escape_string($coneccion, $precio);
$tipo = $_POST['tipo'];
$tipo = mysqli_real_escape_string($coneccion, $tipo);
$marca = $_POST['marca'];
$marca = mysqli_real_escape_string($coneccion, $marca);
$ubicacion = "Media/productos/".$_FILES['file']['name'];
$ubicacion = mysqli_real_escape_string($coneccion, $ubicacion);

//este almacena el archivo en media/productos/ donde los tomara la BD
//actualizamos el producto
	require_once('coneccion.php');
	$insercion = mysqli_query($coneccion, "UPDATE productos SET nombre = '$nombre'	,precio = '$precio'	,marca = '$marca' 	,tipo = '$tipo' ,URL = '$ubicacion' WHERE ProductoId = '$id'");
//si se reliza la incercion
	if($insercion){
		//si se realiza el movimiento de la imagen
		if (move_uploaded_file($_FILES['file']['tmp_name'], $ubicacion)) {
			$_SESSION['pasos'] = "1";
			$_SESSION['id'] = $id;
			header("Location: paso2Editor.php");
		}
		else {
			echo "¡Posible ataque de carga de archivos!\n error [103]; contacte con el soporte tecnico"; //en caso de no haberse podido realizar el movimento del la imagen
		}
	}
	else{
		echo "no se ha editado el producto \n error de edición en SQL [107] contacte al soporte técnico;";//en caso de haberse realizado la incercion en la base de datos

	}
	//mostramos los datos de la imagen en caso de error
	echo 'Aquí hay más información de depurado:';
	print_r($_FILES);

	print "</pre>";


?>
