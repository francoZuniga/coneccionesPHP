<?php
/**
 * estes script realiza la insercion de un producto a la base de datos
 *
 * [session_start parametro para poeder usar las sessiones]
 * @var [Objeto]
 * [require_once el la llamada a un fichero externo]
 * @var [Packege]
 */
	session_start();
	require_once('coneccion.php');
/**
	* [$id es id del producto que no llega como parametro de un formulario]
	* @var [INT(numero estero)]
 	* [$ubicacion es la ubicacion donde se almacenara el archivo de imagen que se sube]
 	* @var [String(cadena de caracteres)]
*/
$id = $_SESSION['id'];
$ubicacion = "Media/productos2/".$id."/".$_FILES['imagen']['name'];
/**
 * [$evaluacion es le valor de la consulta a la base de datos ]
 * @var [Function]{
 * 	@param $coneccion es la coneccion a la base de datos
 * 	@param "String" es la consulta a la base de datos
 * 	@return $resultado la consulta en general pueden ser muchos valores o uno solo
 * }
 * [$total es el total de nuemros de registros en la consulta]
 * @var [Function]{
 * @param $evaluacion es la la respuesta a la consulta
 * @return INT la cantidad de registros de 0 para arriva
 * }
 */
$evaluacion = mysqli_query($coneccion, "SELECT url FROM imagenproductos WHERE url = '$ubicacion'");
$total = mysqli_num_rows($evaluacion);
// evaluamos que no se suba la misma imagen
/**
* SI(cantidad de iamgenes con la url es mayor a 0)
	* lo enviamos a la paso3 y listo
*/
if($total > 0){
	header("Location: paso3Editor.php");
}
//este almacena el archivo en media/productos/ donde los tomara la BD
/**
 * [$insercion description]
 * @var [Objeto]
 */
	$insercion = mysqli_query($coneccion, "INSERT INTO imagenproductos(url, IdProducto) VALUES ('$ubicacion','$id')");
	if($insercion){
		if (move_uploaded_file($_FILES['imagen']['tmp_name'], $ubicacion)) {
			 header("Location: paso3Editor.php");
		} else {
			echo "¡Posible ataque de carga de archivos!\n error [103]; contacte al soporte tecnico";
		}
	}
	else{
		echo "no se a podido subir el archivo\n error [101]; contacte al soporte tecnico \n";
	}
	echo 'Aquí hay más información de depurado:';
	print_r($_FILES);

	print "</pre>";

?>
