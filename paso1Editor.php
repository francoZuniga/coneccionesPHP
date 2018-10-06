<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>subir producto</title>
	<link rel="stylesheet" type="text/css" href="Css/subirArchivos.css">
	<link rel="stylesheet" type="text/css" href="Css/menu.css">
	<link rel="stylesheet" type="text/css" href="Css/menu.css">
	<script type="text/javascript" src="Js/validarFile.js"></script>
	<script type="text/javascript" src="ckfinder/ckfinder.js"></script>
	<link rel="shortcut icon" href="Media/icono_imaguen/icono_paguina.png" />
</head>
<body>
<!-- este codicgo es el codigo de ingreso a la subida de archivos tengo que terminar la BD de esto.-->
	<?php
	//conectamos la base de datos
	require_once('coneccion.php');
	$id = $_POST['id'];
	//verificamos que el usurio se halla logueado
	session_start();

		if($_SESSION['usuario'] == null || $_SESSION['usuario'] == ""){
			//redireccionamos a login en caso de no haberse logueado
			header("location: login.php");
		}
	$_SESSION['id'] = $id;
	?>
	<div class="logotipo"><a href="index.php"><img src="Media/icono_imaguen/logo_imaguen.png" class="logo"></a></div>
	<header>
		<input type="checkbox" name="" id="boton-menu">
		<label for="boton-menu"><img src="Media/Menu.png" style="width: 30px;"></label>
		<div class="buscador"><input type="text" name=""><button><strong>Serch...</strong></button></div>
		<a href="login.php"><img src="Media/png/user-5.png" class="login"></a>
			<nav class="menu">
				<ul>
					<li><a href="session.php">inicio</a></li>
				</ul>
			</nav>
	</header>
	<!-- aca es donde se suben los productos donde se coloca la imagen-->
	<section>
		<?php

			$resultado = mysqli_query($coneccion, "SELECT * FROM productos WHERE ProductoId=".$id." ");
			$fila = mysqli_fetch_array($resultado);
		?>
			<div class="paso"><p>1</p></div>
			<form onsubmit="return validar()" enctype="multipart/form-data" action="subirProductoEdicion.php" method="post" class="subida">
				<div class="bloque">
					<p>Subir la imagen del producto:<br>
					<!-- se sube la imagen-->
					<input type="file" name="file" id="file" onchange="return fileValidation()" value="">
					</p>
					<p>Nombrar el producto:<br>
					<!-- el nombre del producto-->
					<input type="text" name="nombre" class="normal" id="nombreProducto" value="<?php echo $fila['nombre']; ?>">
					</p>
				</div>
				<div class="bloque">
					<p>marca del producto: <br>
					<!-- la marca del producto-->
					<input type="text" name="marca" class="normal" id="marca" value="<?php echo $fila['marca']; ?>">
					</p>
					<p>tipo de producto:<br>
					<!-- el select de tipo de producto-->
					<select name="tipo" id="tipo" class="normal" value="">
						<option value="">--seleccinona un tipo--</option>
						<option value="accesorios">accesorios</option>
						<option value="audio">audio</option>
						<option value="variedad">variedad</option>
					</select>
					</p>
				</div>
	            <div class="bloque">
	            	<p>precio del procucto:<br>
					<!-- el precio del producto-->
					<input type="number" step="0.01" name="precio" class="normal" value="<?php echo $fila['precio']; ?>">
					<input type="hidden" value="<?php echo $id;?>" name="id">
					</p>
	            </div>
				<div class="bloque">
					<p>
						<!-- el boton de envio de formulario-->
						<input type="submit" name="" class="enviar" value="Subir">
					</p>
				</div>
			</form>
			<script type="text/javascript">
				CKEDITOR.replace("descripcion");
			</script>
			<script type="text/javascript">
			//seleccionmos el tiop de producto y se lo damos al select
				var combo = document.getElementById('tipo');
			 	var cantidad = combo.length;
				for (i = 0; i < cantidad; i++) {
					if (combo[i].value == "<?php echo $fila['tipo']; ?>") {
							combo[i].selected = true;
					}
				}

			</script>
	</section>
</body>
</html>
