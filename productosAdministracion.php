<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php
//verificamos la sesson iniciada
session_start();

if($_SESSION['usuario'] == null || $_SESSION['usuario'] == ""){
	//redireccionamos a login en caso de no haberse logueado
	header("location: login.php");
}
//en caso de que la variable este no definida la definimos
//tenemos que
require_once('coneccion.php');

if (!isset($_GET['busqueda'])) {
	$busqueda = "";
}
else{
	$busqueda = mysqli_real_escape_string($coneccion, $_GET['busqueda']);
}

 $pagina = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;
 //en caso se que no tengamos un numero de pagina la pagina es la priemera

?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<title>Advanced Store</title>
	<!-- enlace de los estilos-->
	<link rel="stylesheet" type="text/css" href="Css/eliminacionCuerpo.css">
	<link rel="stylesheet" type="text/css" href="Css/menu.css">
	<script src="Js/verFicha.js" type="text/javascript"></script>
	<style type="text/css">

	</style>
	<link rel="shortcut icon" href="Media/icono_imaguen/icono_paguina.png" />
</head>

<body>
	<div class="logotipo"><a href="index.php"><img src="Media/icono_imaguen/logo_imaguen.png" class="logo"></a></div>
	<header>
		<input type="checkbox" name="" id="boton-menu">
		<label for="boton-menu"><img src="Media/Menu.png" style="width: 30px;"></label>
		<div class="buscador"><form action="productos.php" method="get"><input type="text" name="busqueda" id="busqueda" value=<?php echo "\"".$busqueda."\"";?>><button onclick="submit()"><strong>Buscar...</strong></button></form></div>
			<nav class="menu">
				<ul>
					<li><a href="session.php">inicio</a></li>
				</ul>
			</nav>
	</header>
	<section>
	<!-- creamos un filtro-->
		<div class="filtro">
				<form method="get" action="eliminacion.php">
					<select name="busqueda" class="tipo">
						<option value="">filtrar</option>
						<option value="audio">audio</option>
						<option value="accesorios">accesorios</option>
						<option value="variedad">variedad</option>
					</select>
					<input type="submit" name="enviar" value="filtrar">
				</form>
				<!-- el filtro por marca-->
				<form action="eliminacion.php" method="get">
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
					//creamos una consulta general para que muestre todos los datos
					require_once('coneccion.php');

					//creamos las variables de control del paguinador

			$registroPagina = 3; // es la cantidad de registros que deseamos tomar

			$inicio = ($pagina>1)?(($pagina * $registroPagina)-$registroPagina):0; // es el numero de registro dependiendo de la pagina en la que estamos

			//la cantidad de registros existentes en la base de datos
			$resultado = mysqli_query($coneccion, "SELECT * FROM productos");
			$totalRegistros = mysqli_num_rows($resultado);//la cantidad total de registros de la BD

			//busqueda en caso de que la varible de filtro este vacia
			if($busqueda == null || $busqueda == ""){
				//son las variables que usamomos para la paginacion
				$cantidadPaginas = round($totalRegistros/$registroPagina);//redondeamos al valor mas alto de cantidadPaginas

				//reslizamos la consulta
				$resultado = mysqli_query($coneccion, "SELECT * FROM productos LIMIT ".$inicio." , ".$registroPagina." ");

				echo "<div class=\"contenedor1\">";
				//mostramos los resultados
					while ($fila = mysqli_fetch_array($resultado)) {

								echo "
								<div class=\"producto\">
										<div>
											<img src=".$fila['URL'].">
											<input type=\"hidden\" value=".$fila['ProductoId']." name=\"id\" >
										</div>
										<div>
											<p style=\"margin-top:50px;\">nombre: ".$fila['nombre']."</p>
											<p>precio: $ ".$fila['precio']."</p>
											<span id=\"tipo\">tipo: ".$fila['tipo']."</span>
											<form action=\"eliminar.php\" method=\"post\">
												<input type=\"hidden\" value=".$fila['ProductoId']." name=\"id\" >
												<input type=\"submit\" value=\"eliminar\">
											</form>
											<form action=\"paso1Editor.php\" method=\"post\">
												<input type=\"hidden\" value=".$fila['ProductoId']." name=\"id\" >
												<input type=\"submit\" value=\"editar\">
											</form>
											<form action=\"ver.php\" method=\"post\">
												<input type=\"hidden\" value=".$fila['ProductoId']." name=\"id\" >
												<input type=\"submit\" value=\"ver\" name=\"\">
											</form>
										</div>
									</div>";
					}
				echo "</div> <nav class=\"paginacion\" ><ul>";
					//en caso de que la pagina sea la primera
					if ($pagina == 1) {
						echo "<li><a>-</></li>";
					}
					else{
						$numero = $pagina - 1;
						echo "<li><a href=\"eliminacion.php?pagina=".$numero."\"><</></li>";
					}
					for($i=1; $i<=$cantidadPaginas; $i++){
								echo "<li id=\"".$i."\"><a href=\"eliminacion.php?busqueda=".$busqueda."&enviar=filtrar&pagina=".$i."\">".$i."</a></li>";
														}
					if ($pagina == $cantidadPaginas) {
						echo "<li><a>-</></li>";
					}
					else{
						$numero = $pagina + 1;
						echo "<li><a href=\"eliminacion.php?busqueda=".$busqueda."&enviar=filtrar&pagina=".$numero."\">></></li>";
					}

				echo "</ul></nav>";
			}
			else{

				$resultado = mysqli_query($coneccion, "SELECT * FROM productos WHERE nombre LIKE '%".$busqueda."%' OR tipo LIKE '%".$busqueda."%' OR marca LIKE '%".$busqueda."%'");

				$total = mysqli_num_rows($resultado);

				$cantidadPaginas = round($total/$registroPagina);//redondeamos al valor mas alto de cantidadPaginas

				//veriicamos que alla registros

				$resultado = mysqli_query($coneccion, "SELECT * FROM productos WHERE nombre LIKE '%".$busqueda."%' OR tipo LIKE '%".$busqueda."%' OR marca LIKE '%".$busqueda."%' LIMIT ".$inicio." , ".$registroPagina." ");

				if($total<= 0) {
					echo "no hay resultado";
				}

				echo "<div class=\"contenedor1\">";
				while ($fila = mysqli_fetch_array($resultado)) {

					//cambiamos el submit por un boton que llame a la accion
							echo "
							<div class=\"producto\">
									<div>
										<img src=".$fila['URL'].">
										<input type=\"hidden\" value=".$fila['ProductoId']." name=\"id\" >
									</div>
									<div>
										<p style=\"margin-top:50px;\">nombre: ".$fila['nombre']."</p>
										<p>precio: $ ".$fila['precio']."</p>
										<span id=\"tipo\">tipo: ".$fila['tipo']."</span>
										<form action=\"scriptEliminacion.php\" method=\"post\">
											<input type=\"hidden\" value=".$fila['ProductoId']." name=\"id\" >
											<input type=\"submit\" value=\"eliminar\">
										</form>
										<form action=\"paso1Editor.php\" method=\"post\">
											<input type=\"hidden\" value=".$fila['ProductoId']." name=\"id\" >
											<input type=\"submit\" value=\"editar\">
										</form>
										<form action=\"pruevaPOST.php\" method=\"post\">
											<input type=\"hidden\" method=\"post\" id=".$fila['ProductoId']." name=\"id\">
											<input type=\"submit\" value=\"ver\">
										</form>
									</div>
							</div>";
				}
				echo "</div>";

				echo "</div> <nav class=\"paginacion\" ><ul>";

					if ($pagina == 1) {
						echo "<li><a>-</></li>";
					}
					else{
						$numero = $pagina - 1;
						echo "<li><a href=\"eliminacion.php?busqueda=".$busqueda."&enviar=filtrar&pagina=".$numero."\"><</></li>";
					}
					for($i=1; $i<=$cantidadPaginas; $i++){
								echo "<li id=\"".$i."\"><a href=\"eliminacion.php?busqueda=".$busqueda."&enviar=filtrar&pagina=".$i."\">".$i."</a></li>";
														}
					if ($pagina == $cantidadPaginas) {
						echo "<li><a>-</></li>";
					}
					else{
						$numero = $pagina + 1;
						echo "<li><a href=\"eliminacion.php?busqueda=".$busqueda."&enviar=filtrar&pagina=".$numero."\">></></li>";
					}

				echo "</ul></nav>";

			}

	?>
	<form>
		<input type="hidden" name="" id="indicador" value="<?php echo $pagina; ?>">
		<input type="hidden" name="" id="total" value="<?php echo $cantidadPaginas; ?>">
	</form>
	<script type="text/javascript" src="Js/paginador.js"></script>

<!--
!!!! FIN DE LA ADVERTENCIA
-->
<!-- los estilos de la caja-->
	</section>
</body>
</html>
