<?php
/**
 * [session_start description]
 * @var [session]
*/
session_start();
require_once('coneccion.php');
/**
 * [$nombre description]
 * @var [type]
 */
		$nombre = $_POST['nombre'];
		$nombre = mysqli_real_escape_string($coneccion, $nombre);
		$precio = $_POST['precio'];
		$precio = mysqli_real_escape_string($coneccion, $precio);
		$tipo = $_POST['tipo'];
		$tipo = mysqli_real_escape_string($coneccion, $tipo);
		$marca = $_POST['marca'];
		$marca = mysqli_real_escape_string($coneccion, $marca);
		$ubicacion = "Media/productos/".$_FILES['file']['name'];
//evaluamos que no exista un archivo con el mismo nombre, o imagen
	$evaluacion = mysqli_query($coneccion, "SELECT nombre, URL FROM productos WHERE nombre='$nombre' or precio='$precio' and URL = '$ubicacion'");
	$total = mysqli_num_rows($evaluacion);
	if($total > 0){
		exit("error [102]; vuelva a intentar con otro nombre o imagen");
	}
//este almacena el archivo en media/productos/ donde los tomara la BD
	$insercion = mysqli_query($coneccion, "INSERT INTO productos(nombre	,precio	,marca	,tipo ,URL) VALUES ('$nombre', '$precio', '$marca', '$tipo', '$ubicacion')");
//luego tomamos el id de la incercion
	$res = mysqli_query($coneccion, "SELECT ProductoId FROM productos order by ProductoId DESC LIMIT 1");
	$fila = mysqli_fetch_array($res);
	$id = $fila['ProductoId'];
//si se crea un directrio y la insercion se logra, direccionamos a la ficha tecnica
	if($insercion && mkdir("Media/productos2/".$id, 0777)){
		if (move_uploaded_file($_FILES['file']['tmp_name'], $ubicacion)) {
			$_SESSION['pasos'] = "1";
			 header("Location: paso2.php");
		} else {
			echo "¡Posible ataque de carga de archivos!\n error [103]; contacte con el soporte tecnico"; //en caso de no haberse podido realizar el movimento del la imagen
		}
	}
	else{
		echo "no se incertar el producto\n error [101]; contacte con el soporte tecnico";//en caso de haberse realizado la incercion en la base de datos

	}
	echo 'Aquí hay más información de depurado:';
	print_r($_FILES);

	print "</pre>";

?>
