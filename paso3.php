<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>cargar imagenes</title>
	<link rel="stylesheet" type="text/css" href="Css/cargarImagenes.css">
	<link rel="stylesheet" type="text/css" href="Css/menu.css">
	<script type="text/javascript" src="Js/validarFile.js"></script>
</head>
<body>
	<!-- este codigo es el codigo de ingreso a la subida de archivos de las imagenes de los productos.-->
	<?php
	//verificamos que el usurio se halla logueado
		session_start();

		if($_SESSION['usuario'] == null || $_SESSION['usuario'] == ""){
			//redireccionamos a login en caso de no haberse logueado
			header("location: login.php");
		}
	//verificamos que no se alla saltado los pasos 1 y 2
		if ($_SESSION['pasos'] == "2" || $_SESSION['pasos']=="3") {
			$_SESSION['pasos'] = "3";
		}
	//en caso de aver se salado el paso deberemos de terminar el programa
		else{
			exit("se a saltado el paso 2 y 1");
		}
	//obtenesmo el ID del producto
		require_once('coneccion.php');
		$respuestaId = mysqli_query($coneccion, "SELECT ProductoId FROM productos order by ProductoId DESC LIMIT 1");
		$filaId = mysqli_fetch_array($respuestaId);
		$id = $filaId['ProductoId'];
	?>
	<header>
		<input type="checkbox" name="" id="boton-menu">
		<label for="boton-menu"><img src="Media/Menu.png" style="width: 30px;"></label>
		<div class="buscador"><input type="text" name=""><button><strong>Serch...</strong></button></div>
		<a href="login.php"><img src="Media/png/user-5.png" style="width: 30px; float: left; margin: 5px;"></a>
			<nav class="menu">
				<ul>
					<li><a href="eliminacion.php">borrar Producto</a></li>
				</ul>
			</nav>
	</header>
	<!-- aca es donde se suben las imagenes del producto-->
	<section>
		<div class="paso"><p><?php echo $_SESSION['pasos'];?></p></div>
		<form onsubmit="return validar()" enctype="multipart/form-data" action="subirImagenesProductos.php" method="post">
			<div class="bloque">
				<input type="file" name="imagen">
				<input type="hidden" name="id" value=<?php echo "\"".$id."\"";?> >
				<input type="text" name="" value=<?php echo "\"".$id."\"";?>>
				<input type="submit" name="">
			</div>
		</form>
		<div class="bloque">
			<?php
				$respuesta = mysqli_query($coneccion, "SELECT * FROM imagenproductos WHERE IdProducto = ".$id." ");
				while ($fila = mysqli_fetch_array($respuesta)) {
					echo "<div class=\"imagen\"><form method=\"post\" action=\"eliminarImagen.php\"><input type=\"hidden\" value=\"".$fila['numeroIMG']."\" name=\"id\"><input type=\"submit\" value=\"x\"></form><img src=\"".$fila['url']."\"></div>";
				}
			?>
		</div>
		<a href="menuNavegacion.php"><button>terminar</button></a>
	</section>
</body>
</html>
