<?php
session_start();
//guardamos los datos en variables
require_once("coneccion.php");
//guardamos los datos en variables
$modelo = $_POST['modelo'];
$marca = $_POST['marca'];
$ficha = $_POST['ficha'];
$conecctividad = $_POST['conecctividad'];
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
$respuestaTotal = mysqli_query($coneccion, "SELECT * FROM fichaAudio WHERE IdProductos = ".$id." ");
$totalAudio = mysqli_num_rows($respuestaTotal);
if ($totalAudio > 0) {
	exit("error [104]; no se pueden colocar dos ficha Tecnicas a un producto vuelva a intentarlo");
}
else{
	//evaluamos e incertamos los datos
	if($tipo = "accesorios"){
		$insercion = mysqli_query($coneccion, "INSERT INTO fichaAudio(IdProductos, modelo ,marca ,ficha ,conecctividad ,descripcion) VALUES ('$id' ,'$modelo', '$marca', '$ficha', '$conecctividad' ,'$descripcion')");
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
