<?php
	require_once('coneccion.php');
//tomamos el id del ultimo producto
	$res = mysqli_query($coneccion, "SELECT ProductoId FROM productos order by ProductoId DESC LIMIT 1");
	$fila = mysqli_fetch_array($res);
	$id = $fila['ProductoId'];
//almacenamos los valores de formulario en variables
	$id = $_POST['id'];
	$ubicacion = "Media/productos2/".$id."/".$_FILES['imagen']['name'];
//evaluamos que no exista un archivo con el mismo nombre
	$evaluacion = mysqli_query($coneccion, "SELECT url FROM imagenproductos WHERE url = '$ubicacion'");
	$total = mysqli_num_rows($evaluacion);
	if($total > 0){
		exit("existe una imagen con ese nombre, o el nombre del producto se repite");
	}
//este almacena el archivo en media/productos/ donde los tomara la BD
	require_once('coneccion.php');
	$insercion = mysqli_query($coneccion, "INSERT INTO imagenproductos(url, IdProducto) VALUES ('$ubicacion','$id')");
	if($insercion){
		if (move_uploaded_file($_FILES['imagen']['tmp_name'], $ubicacion)) {
			 header("Location: paso3.php");
		} else {
			echo "¡Posible ataque de carga de archivos!\n error [103]; contacte al soporte tecnico";
		}
	}
	else{
		echo "no se a podido subir el archivo\n error [101]; contacte al soporte tecnico \n";
	}
	echo 'Aquí hay más información de depurado:';
	print_r($_FILES);

	print "</pre>";


?>
