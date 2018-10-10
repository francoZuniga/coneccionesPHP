<!DOCTYPE html>
<html lang="en" >
<?php
if (isset($_GET['busqueda'])) {
  $busqueda = $_GET['busqueda'];
}
else {
  $busqueda = "";
}
if (!isset($_GET['tipo'])) {
  $tipo = "accesorios";
}
else{
  $tipo = $_GET['tipo'];
}
 ?>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <title>Menu Desplegable Responsive HTML, CSS y JQuery</title>
  <link href='https://fonts.googleapis.com/css?family=Ubuntu:400,700' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">

  <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css'>
  <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Ubuntu:400,700'>
  <link rel="stylesheet" href="Css/meinFrontendCss.css">
	<link rel="stylesheet" type="text/css" href="Css/productosCuerpo.css">
  <script src="Js/filtro.js"></script>
	<script src="js/paginador.js"></script>
</head>
<body>
  <header>
    <input type="checkbox" id="btn-menu" />
    <label for="btn-menu"><i class="fa fa-bars"></i></label>
    <nav class="menu">
      <ul>
        <li><a href="#">Inicio</a></li>
        <li class="submenu"><a href="#">Nosotros<i class="fa fa-caret-down"></i></a>
          <ul>
            <li><a href="#">¿Quienes Somos?</a></li>
            <li><a href="#">Contacto</a></li>
          </ul>
        </li>
        <li class="submenu"><a href="#">Productos<i class="fa fa-caret-down"></i></a>
					<ul>
            <li><a href="productos.php?tipo=accesorios">Accesorios</a></li>
            <li><a href="productos.php?tipo=audio">Audio</a></li>
						<li><a href="productos.php?tipo=variedad">Variedad</a></li>
          </ul>
				</li>
      </ul>
    </nav>
    <div class="buscador">
      <form class="" action="productos.php" method="get">
        <input type="text" name="busqueda" value="" id="busqueda">
        <button type="button" name="button" onclick="submit()" id="sub"><img src=""></button>
      </form>
    </div>
		<div class="logo">
        <img src="Media/icono_imaguen/icono_paguina.png" alt="">
    </div>
  </header>
  <section>
		<?php
			require_once("paginador.php");
		 ?>
  </section>
	<footer>
		<div>
			<p><a href="">autorias de vectores e iconos</a></p>
			<p><a href="">autorias de desarrollo</a></p>
			<p><a href="">directivos y gerenciales</a></p>
		</div>
		<div>
			<img src="Media/png/facebook.png" alt="">
			<img src="Media/png/facebook.png" alt="">
			<img src="Media/png/facebook.png" alt="">
		</div>
		<div>

		</div>
	</footer>
</body>
</html>
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
  <script  src="js/index.js"></script>
</body>
</html>
