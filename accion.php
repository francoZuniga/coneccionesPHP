<?
require_once("coneccion.php");
$respuesta = mysqli_query($coneccion, "SELECT * FROM usuario ");
while($fila = mysqli_fetch_array($respuesta)){
  echo "<tr>
        <td>".$fila['id']."</td>
        <td>".$fila['usuario']"</td>";
}
echo "hola mundo";
?>
