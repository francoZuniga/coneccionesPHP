<?php
require_once("lib/baseDatos/coneccion.php");
/**
 * [$pagina :la pagina actual] @var [int]
 * [$registosPorPagina :la cantidad de registros] @var [int]
 * [$inicio :desde donde comenzamos a buscar] @var [int]
 * [$consulta :el objeto de tipo consulta] @var [consulta]
 * [$busqueda :es la busqueda por filtro o buscador] @var [_GET dato de String]
 */
$pagina = isset($_GET['pagina']) ? (int)$_GET['pagina']: 1;
$registosPorPagina = 3;
$inicio = ($pagina>0)?(($pagina * $registosPorPagina)- $registosPorPagina): 0;
$consulta = new consulta();
if(isset($_GET['busqueda'])){
  $busqueda = $_GET['busqueda'];
  global $cantidadPaginas, $pagina, $inicio, $consulta, $busqueda, $registosPorPagina;

  $filas = $consulta->getProductosPaginadorConBusqueda($inicio, $registosPorPagina, $busqueda);
  $totalRegistros = count($filas);
  if(isset($totalRegistros)){
  }
  else {
    echo "no hay resultados";
  }
  $cantidadPaginas = ceil($totalRegistros/$registosPorPagina);

  echo $totalRegistros;
}
else{
  global $pagina, $inicio, $consulta, $registosPorPagina;
  //obtenemos los registros y la cantidad de los mismos
  $filas = $consulta->getProductosPaginador($inicio, $registosPorPagina);
  $totalRegistros = count($filas);
  //ontenemos la cantidad de
  $cantidadPaginas = ceil($totalRegistros/$registosPorPagina);

  echo $totalRegistros;
}

 ?>
