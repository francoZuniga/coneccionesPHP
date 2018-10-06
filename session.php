<!DOCTYPE html>
<html lang="en">
<head>
	<head>
	<meta charset="UTF-8">
	<title>subir producto</title>
	<link rel="stylesheet" type="text/css" href="Css/subirArchivos.css">
	<link rel="stylesheet" type="text/css" href="Css/menu.css">
	<link rel="stylesheet" type="text/css" href="Css/menuEmpleados.css">

	<script type="text/javascript" src="Js/validarFile.js"></script>
	<link rel="shortcut icon" href="Media/icono_imaguen/icono_paguina.png" />
</head>
<body>
<!-- este codicgo es el codigo de ingreso a la subida de archivos tengo que terminar la BD de esto.-->
	<?php
	//verificamos que el usurio se halla logueado
		session_start();

		if($_SESSION['usuario'] == null || $_SESSION['usuario'] == ""){
			//redireccionamos a login en caso de no haberse logueado
			header("location: login.php");
		}
		$_SESSION['id'] = "null";
	?>
	<div class="logotipo"><a href="index.php"><img src="Media/icono_imaguen/logo_imaguen.png" class="logo"></a></div>
	<header>
		<input type="checkbox" name="" id="boton-menu">
		<label for="boton-menu"><img src="Media/Menu.png" style="width: 30px;"></label>
		<div class="buscador"><input type="text" name=""><button><strong>Serch...</strong></button></div>
		<a href="login.php"><img src="Media/png/user-5.png" class="login"></a>
			<nav class="menu">
				<ul>
					<li><a href="session.php">Productos</a></li>
					<li><a href="">Almacen</a></li>
					<li><a href="">Ventas</a></li>
					<li><a href="">Stock</a></li>
				</ul>
			</nav>
	</header>
	<section>
		<div>
			<img src="Media/fotosNosotros/suitEmpresarial.png" style="width: 90%; margin: 5%;">
		</div>
		<div>
			<p style="margin: 5%;">
				bienvenido al sistema de gestion de empleados de Advanced Store usted esta en el login o seesion de su suit empresarial. emperamos que se esfurce mucho el dia de hoy
			</p>
		<div>
	</section>
</body>
</html>
