<?php
require_once("../coneccionBD/coneccion.php");
require_once("lib/baseDatos/consultas.php");

$pagina = isset($_GET['pagina']) ? (int)$_GET['pagina']: 1; //la pagina actual si es cualquier cosa es la primera sino la que sigue
$registosPorPagina = 1; //cantidad de registros por pagina
$inicio = ($pagina>0)?(($pagina * $registosPorPagina)- $registosPorPagina): 0;//la pagina inicio para la divicion de del paginador

  if(!$busqueda==""){

    $consulta = new consulta();
    $filas = $consulta->getProductosPaginadorConBusqueda($inicio, $registosPorPagina, $busqueda, $tipo);
    $registosActuales = $consulta->getProductosPaginadorConBusquedaValores($busqueda, $tipo);
    echo $registosActuales;
    //en caso de que halla registros
    if($registosActuales > 0){
      echo "<div class=\"contenedor1\">";
      foreach ($filas as $fila) {
        echo "<div class=\"producto\">
  								<form action=\"producto.php\" method=\"post\">
  									<button onclick=\"submit()\"><img src=".$fila['URL'].">
  									<input type=\"hidden\" value=".$fila['ProductoId']." name=\"id\" >
  										<div>
  											<p>".$fila['nombre']."</p>
  											<p>$ ".$fila['precio']."</p>
  											<input type=\"hidden\" value=".$fila['tipo']." id=\"tipo2\">
  											<span id=\"tipo\">".$fila['tipo']."</span>
  										</div>
  									</button>
  								</form>
  							</div>";
      }
      echo "</div>";
    }
    else {
      echo "no hay resultados";
    }
    $cantidadPaginas = ceil($registosActuales/$registosPorPagina);
    //el paginador en si
    echo "</div> <nav class=\"paginacion\" ><ul>";
  					if ($pagina == 1) {
  						echo "<li><a>-</></li>";
  					}
  					else{
  						$numero = $pagina - 1;
  						echo "<li><a href=\"productos.php?busqueda=".$busqueda."&tipo=".$tipo."&pagina=".$numero."\"><</></li>";
  					}
  					for($i=1; $i<=$cantidadPaginas; $i++){
  								echo "<li id=\"".$i."\"><a href=\"productos.php?busqueda=".$busqueda."&tipo=".$tipo."&pagina=".$i."\">".$i."</a></li>";
            }
  					if ($pagina == $cantidadPaginas) {
  						echo "<li><a>-</></li>";
  					}
  					else{
  						$numero = $pagina + 1;
  						echo "<li><a href=\"productos.php?busqueda=".$busqueda."&tipo=".$tipo."&pagina=".$numero."\">></></li>";
  					}
  				echo "</ul></nav>";
  }
  //en caso de que no halla busqueda
  else{
    $consulta = new consulta();
    //obtenemos los registros y la cantidad de los mismos
    $filas = $consulta->getProductosPaginador($inicio, $registosPorPagina, $tipo);
    //ontenemos la cantidad de
    $totalRegistros = $consulta->getProductosCantidad($tipo);

    $cantidadPaginas = ceil($totalRegistros/$registosPorPagina);

    echo "<div class=\"contenedor1\">";
    foreach ($filas as $fila) {
      echo "<div class=\"producto\">
                <form action=\"producto.php\" method=\"post\">
                  <button onclick=\"submit()\"><img src=".$fila['URL'].">
                  <input type=\"hidden\" value=".$fila['ProductoId']." name=\"id\" >
                    <div>
                      <p>".$fila['nombre']."</p>
                      <p>$ ".$fila['precio']."</p>
                      <input type=\"hidden\" value=".$fila['tipo']." id=\"tipo2\">
                      <span id=\"tipo\">".$fila['tipo']."</span>
                    </div>
                  </button>
                </form>
              </div>";
    }
    echo "</div>";
    //el paginador
    echo "</div> <nav class=\"paginacion\" ><ul>";

  					if ($pagina == 1) {
  						echo "<li><a>-</></li>";
  					}
  					else{
  						$numero = $pagina - 1;
  						echo "<li><a href=\"productos.php?busqueda=".$busqueda."&tipo=".$tipo."&pagina=".$numero."\"><</></li>";
  					}
  					for($i=1; $i<=$cantidadPaginas; $i++){
  								echo "<li id=\"".$i."\"><a href=\"productos.php?busqueda=".$busqueda."&tipo=".$tipo."&pagina=".$i."\">".$i."</a></li>";
                              }
  					if ($pagina == $cantidadPaginas) {
  						echo "<li><a>-</></li>";
  					}
  					else{
  						$numero = $pagina + 1;
  						echo "<li><a href=\"productos.php?busqueda=".$busqueda."&tipo=".$tipo."&pagina=".$numero."\">></></li>";
  					}

  				echo "</ul></nav>";
  }
 ?>
