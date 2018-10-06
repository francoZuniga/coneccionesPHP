<?php
require_once('coneccion.php');
require_once("lib/baseDatos/coneccion.php");
require_once("lib/baseDatos/consultas.php");

if(!isset($_GET['busqueda'])) {
	$busqueda = "";
}
else{
	$busqueda = mysqli_real_escape_string($coneccion, $_GET['busqueda']);
}

 $pagina = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 0;
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<title>Advanced Store</title>
	<link rel="stylesheet" type="text/css" href="Css/productosCuerpo.css">
	<link rel="stylesheet" type="text/css" href="Css/menu.css">
    <script src="Js/filtro.js"></script>
	<link rel="shortcut icon" href="Media/icono_imaguen/icono_paguina.png" />
</head>
<body>
	<!-- la cabezera tendra el logo, ademas de un menu y el acceso a las personas, ademas de una forma de reguistro de usururio-->
	<div class="logotipo"><a href="index.php"><img src="Media/icono_imaguen/logo_imaguen.png" class="logo"></a></div>
	<header>
		<input type="checkbox" name="" id="boton-menu">
		<label for="boton-menu"><img src="Media/Menu.png" style="width: 30px;"></label>
		<div class="buscador"><form action="productos.php" method="get"><input type="text" name="busqueda" id="busqueda" value=<?php echo "\"".$busqueda."\"";?>><button onclick="submit()"><strong>Buscar...</strong></button></form></div>
			<nav class="menu">
				<ul>
					<li><a href="index.php">inicio</a></li>
					<li><a href="nosotros.php">nosotros</a></li>
					<li><a href="productos.php">productos</a></li>
					<li><a href="contacto.php">contacto</a></li>
				</ul>
			</nav>
	</header>
	<!-- este es la seccion que muestra los productos-->
	<section>
	<!-- creamos un filtro-->
		<div class="filtro">
				<form method="get" action="productos.php">
					<select name="busqueda" class="tipo">
						<option value="">filtrar</option>
						<option value="audio">audio</option>
						<option value="accesorios">accesorios</option>
						<option value="variedad">variedad</option>
					</select>
					<input type="submit" name="enviar" value="filtrar">
				</form>
				<form action="productos.php" method="get">
					<select name="busqueda" class="marca">
						<?php
							require_once('coneccion.php');
							$res = mysqli_query($coneccion, "SELECT marca FROM productos");

							while ($fil = mysqli_fetch_array($res)){
								echo "<option value=\"".$fil['marca']."\">".$fil['marca']."</option>";
							}
						?>
					</select>
					<input type="submit" name="enviar" value="filtrar">
				</form>
		</div>
<!--
en esta seccion se declarara la estructura:
como se mostrara los productos tanto desde busqueda filtrado, o normal

!!!NO TOCAR SALVO FRANCO
-->
<?php
require_once("paginador.php");
?>
	<form>
		<input type="hidden" name="" id="indicador" value="<?php echo $pagina; ?>">
		<input type="hidden" name="" id="total" value="<?php echo $cantidadPaginas; ?>">
	</form>
	<script type="text/javascript" src="Js/paginador.js"></script>

<!--
!!!! FIN DE LA ADVERTENCIA
-->
	</section>
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
		</div>
		<!-- autores de contenido-->
		<div>
			<p>autores de contenido:</p>
			<p>documento <a href="autoria.php">autoria</a></p>
			<p>Director: Gaston Zuñiga</p>
			<p>gestora de ventas: Mariana noemi Zuñiga</p>
		</div>
        </footer>
	<div class="contenedor">
		<img src="Media/icono_imaguen/logo_imaguen.png">
		<p>desarrolladores de Advanced Store: Franco Agustin Ojeda Zuñiga, Tomas Agustin Zuñiga</p>
	</div>
    <script src="Js/busquedaLive.js"></script>
</body>
</html>
