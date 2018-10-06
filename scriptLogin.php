<?php
session_start();//iniciamos la session
require_once('coneccion.php');//realizamos la coneccion
//guardamos los datos de el login en variables
$usuario = $_POST['usuario'];
$usuario = mysqli_real_escape_string($coneccion, $usuario);
$pass = $_POST['password'];
$pass = mysqli_real_escape_string($coneccion, $pass);
//verificamos que no vengan vacias
if (!isset($usuario)&&!isset($pass)) {
	header("Location: login.php");
}
//
$result = mysqli_query($coneccion, "SELECT * FROM usuario WHERE usuario = '$usuario'");

if ($fila = mysqli_fetch_array($result)) {//si existe un usurio con ese nombre lo evaluamos
	if ($fila['pass'] == $pass) {//si la contraseña del usurio coinside con la reguistrada entonces se loguea y realizamos el login del usurio
		//creamos la sessoon
		$_SESSION['usuario'] = $usuario;
		header("location: session.php");	
	}
	else{
		//en caso de no conincider la pass
		header("location: login.php");
	}
}
else{
	//en caso de no tener el nombre de usurio registrado
	header("location: login.php");
}

?>
