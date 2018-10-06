<?php
session_start();
require_once("coneccion.php");
//guardamos los datos en variables
$modelo = $_POST['modelo'];
$marca = $_POST['marca'];
$celulares = $_POST['celulares'];
$descripcion = $_POST['descripcion'];
//es el id del producto
$res = mysqli_query($coneccion, "SELECT ProductoId FROM productos order by ProductoId DESC LIMIT 1");
$fila = mysqli_fetch_array($res);
$id = $fila['ProductoId'];
//el tipo de producto
$respuestaTipo = mysqli_query($coneccion, "SELECT tipo FROM productos order by ProductoId DESC LIMIT 1");
$filaTipo = mysqli_fetch_array($respuestaTipo);
$tipo = $filaTipo['tipo'];
//evalumos que no alla una ficha para el producto
$respuestaTotal = mysqli_query($coneccion, "SELECT * FROM fichaAcceosrios WHERE IdProductos = ".$id." ");
$totalAccesorios = mysqli_num_rows($respuestaTotal);
if ($totalAccesorios > 0) {
	exit("error [104]; no se pueden colocar dos ficha Tecnicas a un producto vuelva a intentarlo");
}
else{
	//evaluamos e incertamos los datos
	if($tipo = "accesorios"){
		$insercion = mysqli_query($coneccion, "INSERT INTO fichaAcceosrios(IdProductos, modelo ,marca ,celulares ,descripcion) VALUES ('$id' ,'$modelo', '$marca', '$celulares', '$descripcion')");
		if($insercion) {
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
