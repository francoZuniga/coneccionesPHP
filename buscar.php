<?php
//metemos los datos de la variable de busqueda para poder pasar el parametro
	$busqueda= "";
	require_once('coneccion.php');

	if (isset($busqueda)) {
		$busqueda = $_POST['busqueda'];
		
		$resultado = mysqli_query($coneccion, "SELECT * FROM productos WHERE nombre LIKE '%".$busqueda."%' OR tipo LIKE '%".$busqueda."%' OR marca LIKE '%".$busqueda."%' ");

		while ($fila = mysqli_fetch_array($resultado)) {
		//cambiamos el submit por un boton que llame a la accion
			echo "<div class=\"producto\">
				<form action=\"producto.php\" method=\"post\">
					<label for=\"\"><img src=".$fila['URL']."></label>
					<input type=\"hidden\" value=".$fila['ProductoId']." name=\"id\" >
					<input type=\"submit\" id=\"imgf\" value=\"ver\" style=\" width: 90%; margin: 0 auto; border: none; 	|						background-color: #F0F0F0;color: #DD8B42; size: 20px;\" >
					<p>".$fila['nombre']."</p>
					<p>$ ".$fila['precio']."</p>
					<input type=\"hidden\" value=".$fila['tipo']." id=\"tipo2\">
					<span id=\"tipo\">".$fila['tipo']."</span>	
				</form>
			</div>";
		}

	}
	else{
		$resultado = mysqli_query($coneccion, "SELECT * FROM productos");
		while ($fila = mysqli_fetch_array($resultado)) {

		//cambiamos el submit por un boton que llame a la accion
			echo "<div class=\"producto\">
				<form action=\"producto.php\" method=\"post\">
					<label for=\"\"><img src=".$fila['URL']."></label>
					<input type=\"hidden\" value=".$fila['ProductoId']." name=\"id\" >
					<input type=\"submit\" id=\"imgf\" value=\"ver\" style=\" width: 90%; margin: 0 auto; border: none; 	|						background-color: #F0F0F0;color: #DD8B42; size: 20px;\" >
					<p>".$fila['nombre']."</p>
					<p>$ ".$fila['precio']."</p>
					<input type=\"hidden\" value=".$fila['tipo']." id=\"tipo2\">
					<span id=\"tipo\">".$fila['tipo']."</span>	
				</form>
			</div>";
		}
	}

?>