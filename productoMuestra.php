<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<title>Advanced Store</title>
	<!-- enlaces de los estilos-->
	<link rel="stylesheet" type="text/css" href="Css/cuerpo.css">
	<link rel="stylesheet" type="text/css" href="Css/menu.css">
	<link rel="stylesheet" type="text/css" href="Css/productoInicio.css">

	<script type="text/javascript" src="Js/galeria.js"></script>
	<link rel="shortcut icon" href="Media/icono_imaguen/icono_paguina.png" />
</head>
<body>
	<?php
	require_once('coneccion.php');
	//luego le asignamos el valor a la Id
	$respuestaId = mysqli_query($coneccion, "SELECT ProductoId FROM productos order by ProductoId DESC LIMIT 1");
	$filaId = mysqli_fetch_array($respuestaId);
	$id = $filaId['ProductoId'];
	//sacomos el tipo de producto
	$respuestaTipo = mysqli_query($coneccion, "SELECT tipo FROM productos order by ProductoId DESC LIMIT 1");
	$filaTipo = mysqli_fetch_array($respuestaTipo);
	$tipo = $filaTipo['tipo'];
	?>
	<!-- la cabezera tendra el logo, ademas de un menu y el acceso a las personas, ademas de una forma de reguistro de usururio-->
	<div class="logotipo"><a href="index.php"><img src="Media/icono_imaguen/logo_imaguen.png" class="logo"></a></div>
	<header>
		<input type="checkbox" name="" id="boton-menu">
		<label for="boton-menu"><img src="Media/Menu.png" style="width: 30px;"></label>
		<div class="buscador"><input type="text" name=""><button><strong>Serch...</strong></button></div>
			<nav class="menu">
				<ul>
					<li><a href="index.php">inicio</a></li>
					<li><a href="nosotros.php">nosotros</a></li>
					<li><a href="productos.php">productos</a></li>
					<li><a href="contacto.php">contacto</a></li>
				</ul>
			</nav>
	</header>

	<section>
	    <?php
	    	require_once('coneccion.php');
			$resultado = mysqli_query($coneccion, "SELECT * FROM productos WHERE ProductoId=".$id." ");

			while ($fila = mysqli_fetch_array($resultado))
			{
				echo "<div class=\"imagen-nombre\">
					<img src=".$fila['URL'].">
					<div>
						<p><h1>".$fila['nombre']."</h1></p>
						<p>".$fila['precio']."</p>
					</div>
				</div>";
			}
		?>
		<div style="direction: block; float: left; width: 100%;">
			<?php
				require_once('coneccion.php');
				$respuesta = mysqli_query($coneccion, "SELECT * FROM imagenproductos WHERE IdProducto = ".$id." ");

				while ($fila = mysqli_fetch_array($respuesta)) {
					echo "<img src=".$fila['url'].">";
				}
			?>
		</div>
		<div>
			<table>
				<?php
				//evaluamos el tipo de producto
				if ($tipo == "accesorios") {
					//obtenemos la cantidad de reguistros
					$respuestaTotal = mysqli_query($coneccion, "SELECT * FROM fichaAcceosrios WHERE IdProductos = ".$id." ");
					$totalAccesorios = mysqli_num_rows($respuestaTotal);
					if ($totalAccesorios >= 0) {
						$resultados2 = mysqli_query($coneccion, "SELECT * FROM fichaAcceosrios WHERE IdProductos = ".$id." ");

						while ($fila2 = mysqli_fetch_array($resultados2)) {
							echo "<tr><td>modelo:</td><td> ".$fila2['modelo']."</td><td>marca:</td><td>".$fila2['marca']."</td></tr><tr><td>celulares: </td><td>".$fila2['celulares']."</td></tr><tr><td>descripcion: </td></tr><tr><td cold= \"2\">".$fila2['descripcion']."</td></tr>";
						}
					}
					else{
						echo "<tr><hr></hr><tr>";
					}
				}
				if ($tipo == "audio") {
					//obtenemos la cantidad de reguistros
					$respuestaTotal = mysqli_query($coneccion, "SELECT * FROM fichaAudio WHERE IdProductos = ".$id." ");
					$totalAudio = mysqli_num_rows($respuestaTotal);
					if ($totalAudio >= 0) {
						$resultados2 = mysqli_query($coneccion, "SELECT * FROM fichaAudio WHERE IdProductos = ".$id." ");

						while ($fila2 = mysqli_fetch_array($resultados2)) {
							echo "<tr><td>modelo:</td><td> ".$fila2['modelo']."</td><td>marca:</td><td>".$fila2['marca']."</td></tr><tr><td>ficha: </td><td>".$fila2['ficha']."</td><td>conecctividad: </td><td>".$fila2['conecctividad']."</td></tr><tr><td>descripcion: </td></tr><tr><td cold= \"2\">".$fila2['descripcion']."</td></tr>";
						}
					}
					else{
						echo "<tr><hr></hr><tr>";
					}
				}
				if ($tipo == "variedad") {
					//obtenemos la cantidad de reguistros
					$respuestaTotal = mysqli_query($coneccion, "SELECT * FROM fichaAudio WHERE IdProductos = ".$id." ");
					$totalVariedad = mysqli_num_rows($respuestaTotal);
					if ($totalVariedad >= 0) {
						$resultados2 = mysqli_query($coneccion, "SELECT * FROM fichaVariedad WHERE IdProductos = ".$id." ");

						while ($fila2 = mysqli_fetch_array($resultados2)) {
							echo "<tr><td>modelo:</td><td> ".$fila2['modelo']."</td><td>marca:</td><td>".$fila2['marca']."</td></tr><tr><td>descripcion: </td></tr><tr><td cold= \"2\">".$fila2['descripcion']."</td></tr>";
						}
					}
					else{
						echo "<tr><hr></hr><tr>";
					}
				}
				?>
			</table>
		</div>
	</section>
	<!-- este es el pie de paguina con los datos de dominio, redes sociales, y los autores de la paguina-->
	<footer>
		<!-- reguistro del dominio-->
		<div><p>dominio reguistrado en:</p>
			<p><a href="https://nic.ar/es"> https://nic.ar/es</a></p>
			<p>numero de factura C: 0009-00817978</p>
			<p>nombre de dominio: AdvancedStore.com.ar</p>
		</div>
		<div>
			<!-- este es el sector de las redes sociales-->
			<p>siguenos en: </p>
			<div>
				<a><div class="social"><img src="Media/png/facebook.png"></div></a>
				<a><div class="social"><img src="Media/png/gorjeo.png"></div></a>
				<a><div class="social"><img src="Media/png/instagram.png"></div></a>
			</div>
		</div>
		<!-- autores de contenido-->
		<div>
			<p>autores de contenido:</p>
			<p>iconos: Freepik <a href="http://www.freepik.com/">http://www.freepik.com/</a> y <a href="https://www.flaticon.es/autores/freepik">https://www.flaticon.es/autores/freepik</a></p>
			<p>Director: Gaston Zuñiga</p>
			<p>gestora de ventas: Mariana noemi Zuñiga</p>
		</div>
	</footer>
	<div class="contenedor">
		<img src="Media/icono_imaguen/logo_imaguen.png">
		<p>desarrolladores de Advanced Store: Franco Agustin Ojeda Zuñiga, Tomas Agustin Zuñiga</p>
	</div>
</body>
</html>
