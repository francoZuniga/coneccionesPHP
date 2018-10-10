<?php

class consulta{
  /**
   * [getProductosPaginador :retorna una terna de valores con un limitado]
   * @param  [int] $argInicio [el incio depende de la pagina en la que este]
   * @param  [int] $argFin    [cantidad de registros a sacar]
   * @return [type]            [una arreglo de los valores de la BD]
   */
  public function getProductosPaginador($argInicio, $argFin, $tipo){
    $registos = null;
    $modelo = new coneccion();
    $connecion = $modelo->getConneccion();
    //preparamos consulta
    $consulta = "SELECT * FROM productos WHERE tipo='$tipo' LIMIT $argInicio, $argFin";
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
   * @param  [int] $inicio   [el inicio de la busqueda depende de la pagina]
   * @param  [int] $fin      [la cantidad de registros]
   * @param  [String] $busqueda [la busqueda de los mismos]
   * @return [type]           [el arreglo de la busqueda]
   */
  public function getProductosPaginadorConBusqueda($inicio, $fin, $busqueda, $tipo){
    $registos = null;
    $modelo = new coneccion();
    $connecion = $modelo->getConneccion();
    //preparamos consulta
    $consulta = "SELECT * FROM productos WHERE nombre LIKE '%$busqueda%' OR marca LIKE '%$busqueda%' OR tipo LIKE '%$tipo%' LIMIT $inicio , $fin";
    $declaracion = $connecion->prepare($consulta);
    $declaracion->execute();
    while ($resultado = $declaracion->fetch()){
      $registos[]= $resultado;
    }
    //devoldemos los registros
    return $registos;
  }
  /**
   * [getProductosCantidad description]
   * @param  [type] $tipo [description]
   * @return [type]       [description]
   */
  public function getProductosCantidad($tipo){
    $registos = null;
    $modelo = new coneccion();
    $connecion = $modelo->getConneccion();
    //preparamos consulta
    $consulta = "SELECT * FROM productos WHERE tipo='$tipo'";
    $declaracion = $connecion->prepare($consulta);
    $declaracion->execute();
    while ($resultado = $declaracion->fetch()){
      $registos[]= $resultado;
    }
    //devoldemos los registros
    return count($registos);
  }
  /**
   * [getProductosPaginadorConBusquedaValores description]
   * @param  [type] $busqueda [description]
   * @param  [type] $tipo     [description]
   * @return [type]           [description]
   */
  public function getProductosPaginadorConBusquedaValores($busqueda, $tipo){
    $registos = null;
    $modelo = new coneccion();
    $connecion = $modelo->getConneccion();
    //preparamos consulta
    $consulta = "SELECT * FROM productos WHERE nombre LIKE '%$busqueda%' OR marca LIKE '%$busqueda%' OR tipo LIKE '%$tipo%' ";
    $declaracion = $connecion->prepare($consulta);
    $declaracion->execute();
    while ($resultado = $declaracion->fetch()){
      $registos[]= $resultado;
    }
    //devoldemos los registros
    return count($registos);
  }
}

 ?>
