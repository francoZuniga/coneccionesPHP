<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>fichaTecnica</title>
	<link rel="stylesheet" type="text/css" href="Css/subirArchivos.css">
	<link rel="stylesheet" type="text/css" href="Css/menu.css">

	<script type="text/javascript" src="Js/validarFile.js"></script>
	<script type="text/javascript" src="ckfinder/ckfinder.js"></script>
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
	//evaluamos el estado de la dicha
		if ($_SESSION['pasos'] != "1") {
			exit("se a saltado el paso 1 asdasd");
		}
		require_once('coneccion.php');
		//obtenemos el tipo de productp
		$respuesta = mysqli_query($coneccion, "SELECT tipo FROM productos order by ProductoId DESC LIMIT 1");
		$fila = mysqli_fetch_array($respuesta);
		$tipo = $fila['tipo'];
	?>
	<div class="logotipo"><a href="index.php"><img src="Media/icono_imaguen/logo_imaguen.png" class="logo"></a></div>
	<header>
		<input type="checkbox" name="" id="boton-menu">
		<label for="boton-menu"><img src="Media/Menu.png" style="width: 30px;"></label>
		<div class="buscador"><input type="text" name=""><button><strong>Serch...</strong></button></div>
		<a href="login.php"><img src="Media/png/user-5.png" class="login"></a>
			<nav class="menu">
				<ul>
					<li><a href="menuNavegacion.php">inicio</a></li>
				</ul>
			</nav>
	</header>
	<!-- aca es donde se suben los productos donde se coloca la imagen-->
	<section>
		<div class="paso"><p>2</p></div>
		<?php
		if ($tipo == "accesorios") {
			echo "
			<form onsubmit=\"return validarAccesorios()\" enctype=\"multipart/form-data\" action=\"subirFichaAccesorios.php\" method=\"post\" class=\"subida\">
				<div class=\"bloque\">
					<p>Modelo:<br>
					<!-- modelo del prosucto-->
					<input type=\"text\" name=\"modelo\" id=\"modelo\" class=\"normal\">
					</p>
					<p>Marca:<br>
					<!-- marca del producto-->
					<input type=\"text\" name=\"marca\" id=\"Marca\" class=\"normal\">
					</p>
				</div>
				<div class=\"bloque\">
					<p>Celulares: <br>
					<!-- celulares-->
					<input type=\"text\" name=\"celulares\" class=\"normal\" id=\"celulares\">
					</p>
				</div>
				<div class=\"bloque\">
					<p style=\"width: 100%;\">descripcion:<br>
					<!-- la descripcion del producto-->
						<textarea id=\"descripcion\" name=\"descripcion\"></textarea>
					</p>
				</div>
				<div class=\"bloque\">
					<p>
						<!-- el boton de envio de formulario-->
						<input type=\"submit\" name=\"\" class=\"enviar\" value=\"Subir\">
					</p>
				</div>
			</form>
			<br>";
		}
		if ($tipo == "audio") {
		echo "
			<form onsubmit=\"return validarAudio()\" enctype=\"multipart/form-data\" action=\"SubirFichaAudio.php\" method=\"post\" class=\"subida\">
				<div class=\"bloque\">
					<p>Modelo:<br>
					<!-- modelo del prosucto-->
					<input type=\"text\" name=\"modelo\" id=\"modelo\" class=\"normal\">
					</p>
					<p>Marca:<br>
					<!-- marca del producto-->
					<input type=\"text\" name=\"marca\" id=\"Marca\" class=\"normal\">
					</p>
				</div>
				<div class=\"bloque\">
					<p>Ficha: <br>
					<!-- ficha-->
					<input type=\"text\" name=\"ficha\" class=\"normal\" id=\"ficha\">
					</p>
					<p>Conectividad: <br>
						<input type=\"text\" name=\"conecctividad\" class=\"normal\" id=\"conecctividad\">
					</p>
				</div>
				<div class=\"bloque\">
					<p style=\"width: 100%;\">descripcion:<br>
					<!-- la descripcion del producto-->
						<textarea id=\"descripcion\" name=\"descripcion\"></textarea>
					</p>
				</div>
				<div class=\"bloque\">
					<p>
						<!-- el boton de envio de formulario-->
						<input type=\"submit\" name=\"\" class=\"enviar\" value=\"Subir\">
					</p>
				</div>
			</form>";
		}
		if ($tipo == "variedad") {
			echo "
			<form onsubmit=\"return validarVariedad()\" enctype=\"multipart/form-data\" action=\"subirFichaVariedad.php\" method=\"post\" class=\"subida\">
				<div class=\"bloque\">
					<p>Modelo:<br>
					<!-- modelo del prosucto-->
					<input type=\"text\" name=\"modelo\" id=\"modelo\" class=\"normal\">
					</p>
					<p>Marca:<br>
					<!-- marca del producto-->
					<input type=\"text\" name=\"marca\" id=\"Marca\" class=\"normal\">
					</p>
				</div>
				<div class=\"bloque\">
					<p style=\"width: 100%;\">descripcion:<br>
					<!-- la descripcion del producto-->
						<textarea id=\"descripcion\" name=\"descripcion\"></textarea>
					</p>
				</div>
				<div class=\"bloque\">
					<p>
						<!-- el boton de envio de formulario-->
						<input type=\"submit\" name=\"\" class=\"enviar\" value=\"Subir\">
					</p>
				</div>
			</form>";
		}
		?>;
			<script type="text/javascript">
				CKEDITOR.replace("descripcion");
			</script>
	</section>
</body>
</html>
