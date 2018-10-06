<?php
session_start();
require_once("coneccion.php");
//guardamos los datos en variables de la ficha tecnica de variedad
$modelo = $_POST['modelo'];
$marca = $_POST['marca'];
$descripcion = $_POST['descripcion'];
//es el id del producto
$res = mysqli_query($coneccion, "SELECT ProductoId FROM productos order by ProductoId DESC LIMIT 1");
$fila = mysqli_fetch_array($res);
$id = $fila['ProductoId'];
//el tipo de producto
$respuestaTipo = mysqli_query($coneccion, "SELECT tipo FROM productos order by ProductoId DESC LIMIT 1");
$filaTipo = mysqli_fetch_array($respuestaTipo);
$tipo = $filaTipo['tipo'];
//evaluamos que no alla una ficha para el producto
$respuestaTotal = mysqli_query($coneccion, "SELECT * FROM fichaVariedad WHERE IdProductos = ".$id." ");
$totalVariedad = mysqli_num_rows($respuestaTotal);
if ($totalVariedad > 0) {
	exit("no se pueden colocar dos ficha Tecnicas a un producto");
}
else{
	//evaluamos e incertamos los datos
	if($tipo = "audio"){
		$insercion = mysqli_query($coneccion, "INSERT INTO fichaVariedad(IdProductos, modelo ,marca , descripcion) VALUES ('$id', '$modelo', '$marca', '$descripcion')");
		if ($insercion) {
			$_SESSION['pasos']= "2";
			header("Location: paso3.php");
		}
		else{
			echo "error [101]; contacte al soporte tecnico";
		}
	}
	else{
		echo "el formulario no es del tipo: ".$tipo." vuelva a comenzar de nuevo";
	}
}
?>
