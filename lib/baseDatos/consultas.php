<?php
class consulta{
  /**
   * usadas por el paginador
   * [getCantidadRegistros :devulce los registros de los producto con un limite]
   * @return [array] [arreglo de BD]
   */
  public function getProductosPaginador($argInicio, $argFin){
    $registos = null;
    $inicio = 2;
    $modelo = new coneccion();
    $connecion = $modelo->getConneccion();
    //preparamos consulta
    $consulta = "SELECT * FROM productos LIMIT $argInicio, $argFin";
    $declaracion = $connecion->prepare($consulta);
    //la pedimos y guardamos las consulta en una arreglo
    $declaracion->execute();
    while($resultado = $declaracion->fetch()){
      $registos[] = $resultado;
    }
    return $registos;
  }
  /**
   * [getProductosPaginadorConBusqueda :retorna un arreglo dependiendo de la busqueda y con un limite de registros]
   * @param  [type] $inicio   [description]
   * @param  [type] $fin      [description]
   * @param  [type] $busqueda [description]
   * @return [type]           [description]
   */
  public function getProductosPaginadorConBusqueda($inicio, $fin, $busqueda){
    $registos = null;
    $modelo = new coneccion();
    $connecion = $modelo->getConneccion();
    //preparamos consulta
    $consulta = "SELECT * FROM productos WHERE nombre LIKE '%$busqueda%' OR tipo LIKE '%$busqueda%' OR marca LIKE '%$busqueda%' LIMIT $inicio , $fin";
    $declaracion = $connecion->prepare($consulta);
    $declaracion->bindParam(':busqueda', $busqueda);
    $declaracion->execute();
    while ($resultado = $declaracion->fetch()){
      $registos[]= $resultado;
    }
    //devoldemos los registros
    return $registos;
  }
  public function getProductos($argId){

  }
}

 ?>
