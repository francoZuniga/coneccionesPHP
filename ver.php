<?php
require_once("coneccion.php");
$id = $_POST['id'];
?>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<title>Advanced Store</title>
	<!-- enlaces de los estilos-->
	<link rel="stylesheet" type="text/css" href="Css/cuerpo.css">
	<link rel="stylesheet" type="text/css" href="Css/menu.css">
	<link rel="stylesheet" type="text/css" href="Css/productoInicio.css">
		<link rel="shortcut icon" href="Media/icono_imaguen/icono_paguina.png" />

	<link rel="stylesheet" type="text/css" href="slick/slick.css"/>
	  <link rel="stylesheet" type="text/css" href="slick/slick-theme.css"/>

	  <style type="text/css">
	    html, body {
	      margin: 0;
	      padding: 0;
	    }

	    * {
	      box-sizing: border-box;
	    }

	    .slider {
	        width: 50%;
	        margin: 100px auto;
	    }

	    .slick-slide {
	      margin: 0px 20px;
	    }

	    .slick-slide img {
	      width: 100%;
	    }

	    .slick-prev:before,
	    .slick-next:before {
	      color: black;
	    }


	    .slick-slide {
	      transition: all ease-in-out .3s;
	      opacity: .2;
	    }

	    .slick-active {
	      opacity: .5;
	    }

	    .slick-current {
	      opacity: 1;
	    }
			.producto .lazy button{
				background-color: rgba(225,56,28, 0.9);
			}
      .producto{
        width: 70%;
        height: auto;
        margin: 1%;
        background-color: #d2d2d2;
      }
      .producto .lazy{
        width: 50%;
        height: auto;
				margin: 1%;
        background-color: #fff;
      }
      .producto .lazy div{
        background-color: #ffffff;
        height: auto;
				width: 80%;
				margin-left: 20px;
      }
      .producto .lazy div img{
      	margin: 0 auto;
        width: 100%;
      }
      @media (max-width: 768px) {
        .producto{
        	margin-top: 100px;
          width: 100%;
        }
        .producto .lazy{
          width: 98%;
        }
				.producto p{
					width: 100%;
					margin-left: 1%;
					float: left;
				}
      }
	  </style>
</head>
<body>
	<!-- la cabezera tendra el logo, ademas de un menu y el acceso a las personas, ademas de una forma de reguistro de usururio-->
	<div class="logotipo"><a href="index.php"><img src="Media/icono_imaguen/logo_imaguen.png" class="logo"></a></div>
	<header>
		<input type="checkbox" name="" id="boton-menu">
		<label for="boton-menu"><img src="Media/Menu.png" style="width: 30px;"></label>
		<div class="buscador"><input type="text" name=""><button><strong>Serch...</strong></button></div>
			<nav class="menu">
				<ul>
					<li><a href="session.php">inicio</a></li>
				</ul>
			</nav>
	</header>

	<section>
    <!-- creamos el cuarpo del producto-->
    <div class="producto">

      <div class="lazy" data-sizes="50vw">
        <?php
					//imprimimos la imagen del producto y sus restantes
					$respuestaProducto = mysqli_query($coneccion, "SELECT * FROM productos WHERE ProductoId = '$id'" );
					$respuestaImagenesProducto = mysqli_query($coneccion, "SELECT * FROM imagenproductos WHERE IdProducto = '$id'" );
					while($fila = mysqli_fetch_array($respuestaProducto)){
						echo "
						<div>
							<img src=\"".$fila['URL']."\">
						</div>
						";
					}
					while($filaImagenes = mysqli_fetch_array($respuestaImagenesProducto)){
						echo "
						<div>
							<img src=\"".$filaImagenes['url']."\">
						</div>
						";
					}
				?>
      </div>
      <p>Nombre:</p>
      <br>
      <p>Precio:</p>
    </div>
		<a href="#" class="tooltips"></a>

		<script src="https://code.jquery.com/jquery-2.2.0.min.js" type="text/javascript"></script>
    <script src="./slick/slick.js" type="text/javascript" charset="utf-8"></script>
    <script type="text/javascript">
      $(document).on('ready', function() {
        $(".vertical-center-4").slick({
          dots: true,
          vertical: true,
          centerMode: true,
          slidesToShow: 4,
          slidesToScroll: 2
        });
        $(".vertical-center-3").slick({
          dots: true,
          vertical: true,
          centerMode: true,
          slidesToShow: 3,
          slidesToScroll: 3
        });
        $(".vertical-center-2").slick({
          dots: true,
          vertical: true,
          centerMode: true,
          slidesToShow: 2,
          slidesToScroll: 2
        });
        $(".vertical-center").slick({
          dots: true,
          vertical: true,
          centerMode: true,
        });
        $(".vertical").slick({
          dots: true,
          vertical: true,
          slidesToShow: 3,
          slidesToScroll: 3
        });
        $(".regular").slick({
          dots: true,
          infinite: true,
          slidesToShow: 3,
          slidesToScroll: 3
        });
        $(".center").slick({
          dots: true,
          infinite: true,
          centerMode: true,
          slidesToShow: 5,
          slidesToScroll: 3
        });
        $(".variable").slick({
          dots: true,
          infinite: true,
          variableWidth: true
        });
        $(".lazy").slick({
          lazyLoad: 'ondemand', // ondemand progressive anticipated
          infinite: true
        });
      });
  </script>

	<div class="">
		<table>
			<?php
			/*
			*tomamo el id del producto para poder tomar el tipo de producto
			*y segun el tipo de producto crearemos la tabla de dicho producto
			 */
			$tipo = mysqli_query($coneccion,"SELECT tipo FROM productos WHERE ProductoId = '$id'");

			if ($tipo == "acesorios") {
				/*

				 */
				$respuestaTotal = mysqli_query($coneccion, "SELECT * FROM fichaAcceosrios WHERE IdProductos ='$id' ");
				$totalAccesorios = mysqli_num_rows($respuestaTotal);

				if ($totalAccesorios >= 0) {
					$resultados2 = mysqli_query($coneccion, "SELECT * FROM fichaAcceosrios WHERE IdProductos ='$id' ");

					while ($fila2 = mysqli_fetch_array($resultados2)) {
						echo "<tr><td>modelo:</td><td> ".$fila2['modelo']."</td><td>marca:</td><td>".$fila2['marca']."</td></tr><tr><td>celulares: </td><td>".$fila2['celulares']."</td></tr><tr><td>descripcion: </td></tr><tr><td cold= \"2\">".$fila2['descripcion']."</td></tr>";
					}
				}
				else{
					echo "<tr><hr></hr><tr>";
				}
			}
			if ($tipo == "audio") {
				//obtenemos la cantidad de reguistros
				$respuestaTotal = mysqli_query($coneccion, "SELECT * FROM fichaAudio WHERE IdProductos ='$id' ");
				$totalAudio = mysqli_num_rows($respuestaTotal);
				if ($totalAudio >= 0) {
					$resultados2 = mysqli_query($coneccion, "SELECT * FROM fichaAudio WHERE IdProductos ='$id' ");

					while ($fila2 = mysqli_fetch_array($resultados2)) {
						echo "<tr><td>modelo:</td><td> ".$fila2['modelo']."</td><td>marca:</td><td>".$fila2['marca']."</td></tr><tr><td>ficha: </td><td>".$fila2['ficha']."</td><td>conecctividad: </td><td>".$fila2['conecctividad']."</td></tr><tr><td>descripcion: </td></tr><tr><td cold= \"2\">".$fila2['descripcion']."</td></tr>";
					}
				}
				else{
					echo "<tr><hr></hr><tr>";
				}
			}
			if ($tipo == "variedad") {
				//obtenemos la cantidad de reguistros
				$respuestaTotal = mysqli_query($coneccion, "SELECT * FROM fichaAudio WHERE IdProductos ='$id' ");
				$totalVariedad = mysqli_num_rows($respuestaTotal);
				if ($totalVariedad >= 0) {
					$resultados2 = mysqli_query($coneccion, "SELECT * FROM fichaVariedad WHERE IdProductos ='$id' ");

					while ($fila2 = mysqli_fetch_array($resultados2)) {
						echo "<tr><td>modelo:</td><td> ".$fila2['modelo']."</td><td>marca:</td><td>".$fila2['marca']."</td></tr><tr><td>descripcion: </td></tr><tr><td cold= \"2\">".$fila2['descripcion']."</td></tr>";
					}
				}
				else{
					echo "<tr><hr></hr><tr>";
				}
			}
			?>
		</table>
	</div>
	</section>
	<!-- este es el pie de paguina con los datos de dominio, redes sociales, y los autores de la paguina-->
	<footer>
		<!-- reguistro del dominio-->
		<div><p>dominio reguistrado en:</p>
			<p><a href="https://nic.ar/es"> https://nic.ar/es</a></p>
			<p>numero de factura C: 0009-00817978</p>
			<p>nombre de dominio: AdvancedStore.com.ar</p>
		</div>
		<div>
			<!-- este es el sector de las redes sociales-->
			<p>siguenos en: </p>
			<div>
				<a><div class="social"><img src="Media/png/facebook.png"></div></a>
				<a><div class="social"><img src="Media/png/gorjeo.png"></div></a>
				<a><div class="social"><img src="Media/png/instagram.png"></div></a>
			</div>
		</div>
		<!-- autores de contenido-->
		<div>
			<p>autores de contenido:</p>
			<p>iconos: Freepik <a href="http://www.freepik.com/">http://www.freepik.com/</a> y <a href="https://www.flaticon.es/autores/freepik">https://www.flaticon.es/autores/freepik</a></p>
			<p>Director: Gaston Zuñiga</p>
			<p>gestora de ventas: Mariana noemi Zuñiga</p>
		</div>
	</footer>
	<div class="contenedor">
		<img src="Media/icono_imaguen/logo_imaguen.png">
		<p>desarrolladores de Advanced Store: Franco Agustin Ojeda Zuñiga, Tomas Agustin Zuñiga</p>
	</div>
</body>
</html>
