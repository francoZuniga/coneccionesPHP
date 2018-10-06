<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
</head>

<body>
<?php
	require_once('coneccion.php');
	//realizamos la eliminacion
	//obtenemos el tipo de producto
	$respuestaTipo = mysqli_query($coneccion, "SELECT * FROM productos WHERE  ProductoId=".$_POST['id']." ");
	$tipoRespuesta = mysqli_fetch_array($respuestaTipo);
	$tipo = $tipoRespuesta['tipo'];
	echo $tipo;
	//eliminamos de productos
	$resultado4 = mysqli_query($coneccion, "DELETE from productos WHERE ProductoId=".$_POST['id']." ");
	//eliminamos de productos imagen
	$resultado5 = mysqli_query($coneccion, "DELETE from imagenproductos WHERE IdProductos=".$_POST['id']." ");
	//si se eliinan los productos de la base de datos emitimos un mensaje de terminado, en caso contrario remitimos en fallo

	if ($tipo == "accesorios") {
		$respuesta6 = mysqli_query($coneccion, "DELETE from fichaAcceosrios WHERE 	IdProductos=".$_POST['id']." ");
	}
	else {
		//en caso de no ser del tipo accesorios
		if($tipo == "audio"){
				$respuesta6 = mysqli_query($coneccion, "DELETE from fichaAudio WHERE 	IdProductos=".$_POST['id']." ");
		}
		else{
			$respuesta6 = mysqli_query($coneccion, "DELETE from fichaVariedad WHERE 	IdProductos=".$_POST['id']." ");
		}
	}

	if($resultado5 && $resultado4 && $respuesta6){
		echo "se a eliminado el registro exitosamente";
		}
	else{
		echo "no se ha podido eliminar el registro; error [105]; contecte al soporte tecnico";
		}
?>
<br/>
<a href="productosAdministracion.php"><p>terminar</p></a>
</body>
</html>
