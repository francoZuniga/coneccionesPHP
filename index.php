<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<title>Advanced Store</title>
	<!-- enlaces de los estilos-->
	<link rel="stylesheet" type="text/css" href="Css/menu.css">
	<link rel="stylesheet" type="text/css" href="Css/galeria.css">
	<link rel="stylesheet" type="text/css" href="Css/productoInicio.css">
	<link rel="shortcut icon" href="Media/icono_imaguen/icono_paguina.png" />
</head>
<body>
	<!-- la cabezera tendra el logo, ademas de un menu y el acceso a las personas, ademas de una forma de reguistro de usururio-->
	<div class="logotipo"><a href="index.php"><img src="Media/icono_imaguen/logo_imaguen.png" class="logo"></a></div>
	<header>
		<input type="checkbox" name="" id="boton-menu">
		<label for="boton-menu"><img src="Media/Menu.png" style="width: 30px;"></label>
		<div class="buscador"><input type="text" name=""><button><strong>Serch...</strong></button></div>
		<a href="login.php"><img src="Media/png/user-5.png" class="login"></a>
			<nav class="menu">
				<ul>
					<li><a href="index.php">inicio</a></li>
					<li><a href="nosotros.php">nosotros</a></li>
					<li><a href="productos.php">productos</a></li>
					<li><a href="contacto.php">contacto</a></li>
				</ul>
			</nav>
	</header>
	<div style="width: 100%; height: auto; margin: 0; padding: 0;" class="slider">
    <!-- este es el slider de tomi-->
	    <script src="Js/jssor.slider-27.1.0.min.js" type="text/javascript"></script>
	    <script type="text/javascript">
	        jssor_1_slider_init = function() {

	            var jssor_1_SlideoTransitions = [
	              [{b:-1,d:1,o:-0.7}],
	              [{b:900,d:2000,x:-379,e:{x:7}}],
	              [{b:900,d:2000,x:-379,e:{x:7}}],
	              [{b:-1,d:1,o:-1,sX:2,sY:2},{b:0,d:900,x:-171,y:-341,o:1,sX:-2,sY:-2,e:{x:3,y:3,sX:3,sY:3}},{b:900,d:1600,x:-283,o:-1,e:{x:16}}]
	            ];

	            var jssor_1_options = {
	              $AutoPlay: 1,
	              $SlideDuration: 800,
	              $SlideEasing: $Jease$.$OutQuint,
	              $CaptionSliderOptions: {
	                $Class: $JssorCaptionSlideo$,
	                $Transitions: jssor_1_SlideoTransitions
	              },
	              $ArrowNavigatorOptions: {
	                $Class: $JssorArrowNavigator$
	              },
	              $BulletNavigatorOptions: {
	                $Class: $JssorBulletNavigator$
	              }
	            };

	            var jssor_1_slider = new $JssorSlider$("jssor_1", jssor_1_options);


	            var MAX_WIDTH = 3000;

	            function ScaleSlider() {
	                var containerElement = jssor_1_slider.$Elmt.parentNode;
	                var containerWidth = containerElement.clientWidth;

	                if (containerWidth) {

	                    var expectedWidth = Math.min(MAX_WIDTH || containerWidth, containerWidth);

	                    jssor_1_slider.$ScaleWidth(expectedWidth);
	                }
	                else {
	                    window.setTimeout(ScaleSlider, 30);
	                }
	            }

	            ScaleSlider();

	            $Jssor$.$AddEvent(window, "load", ScaleSlider);
	            $Jssor$.$AddEvent(window, "resize", ScaleSlider);
	            $Jssor$.$AddEvent(window, "orientationchange", ScaleSlider);

	        };
	    </script>
	    <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed:300,300italic,regular,italic,700,700italic&subset=latin-ext,greek-ext,cyrillic-ext,greek,vietnamese,latin,cyrillic" rel="stylesheet" type="text/css" />
	    <style>

	        .jssorl-009-spin img {
	            animation-name: jssorl-009-spin;
	            animation-duration: 1.6s;
	            animation-iteration-count: infinite;
	            animation-timing-function: linear;
	        }

	        @keyframes jssorl-009-spin {
	            from { transform: rotate(0deg); }
	            to { transform: rotate(360deg); }
	        }




	        .jssorb032 {position:absolute;}
	        .jssorb032 .i {position:absolute;cursor:pointer;}
	        .jssorb032 .i .b {fill:#fff;fill-opacity:0.7;stroke:#000;stroke-width:1200;stroke-miterlimit:10;stroke-opacity:0.25;}
	        .jssorb032 .i:hover .b {fill:#000;fill-opacity:.6;stroke:#fff;stroke-opacity:.35;}
	        .jssorb032 .iav .b {fill:#000;fill-opacity:1;stroke:#fff;stroke-opacity:.35;}
	        .jssorb032 .i.idn {opacity:.3;}




	        .jssora051 {display:block;position:absolute;cursor:pointer;}
	        .jssora051 .a {fill:none;stroke:#fff;stroke-width:360;stroke-miterlimit:10;}
	        .jssora051:hover {opacity:.8;}
	        .jssora051.jssora051dn {opacity:.5;}
	        .jssora051.jssora051ds {opacity:.3;pointer-events:none;}
	    </style>
	    <div id="jssor_1" style="position:relative;margin:0 auto;top:0px;left:0px;width:1300px;height:325px;overflow:hidden;visibility:hidden;">





	        <div data-u="slides" style="cursor:default;position:relative;top:0px;left:0px;width:1300px;height:325px;overflow:hidden;">
	            <div data-p="225.00">
	                <img data-u="image" src="img/01.jpg" />
	            </div>
	            <div data-p="225.00">
	                <img data-u="image" src="img/02.jpg" />
	            </div>
	            <div data-p="225.00">
	                <img data-u="image" src="img/03.jpg" />
	            </div>
	        </div>
	        <!-- navegacion con puntos  -->
	        <div data-u="navigator" class="jssorb032" style="position:absolute;bottom:12px;right:12px;" data-autocenter="1" data-scale="0.5" data-scale-bottom="0.75">
	            <div data-u="prototype" class="i" style="width:16px;height:16px;">
	                <svg viewbox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
	                    <circle class="b" cx="8000" cy="8000" r="5800"></circle>
	                </svg>
	            </div>
	        </div>



	        <!-- navegacion con flechas -->
	        <div data-u="arrowleft" class="jssora051" style="width:65px;height:65px;top:0px;left:25px;" data-autocenter="2" data-scale="0.75" data-scale-left="0.75">
	            <svg viewbox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
	                <polyline class="a" points="11040,1920 4960,8000 11040,14080 "></polyline>
	            </svg>
	        </div>
	        <div data-u="arrowright" class="jssora051" style="width:65px;height:65px;top:0px;right:25px; color: black;" data-autocenter="2" data-scale="0.75" data-scale-right="0.75">
	            <svg viewbox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
	                <polyline class="a" points="4960,1920 11040,8000 4960,14080 "></polyline>
	            </svg>
	        </div>
	    </div>
	    <script type="text/javascript">jssor_1_slider_init();</script>
<!--
poco se toca aqui salvo las imagenes que se cambian periodicamente

-->
</div>
	<section class="">
	<!-- este es el eslider de los productos-->
	<div class="">
		<!-- este es un producto que se muestra-->
		<div class="producto">
			<form action="archivo.php" method="post">
				<input type="submit" name="" value="ID" id="foto" style="display: none;">
				<label for="foto"><img src="Media/Fotoss/1.png" style="width: 30px;"></label>
				<label for="foto"><p>nombre</p></label>
				<label for="foto"><p>precio</p></label>
			</form>
		</div>
		<!-- este es otro producto que se muestra-->
		<div class="producto">
			<form action="archivo.php" method="post">
				<input type="submit" name="" value="ID" id="foto" style="display: none;">
				<label for="foto"><img src="Media/Fotoss/1.png" style="width: 30px;"></label>
				<label for="foto"><p>nombre</p></label>
				<label for="foto"><p>precio</p></label>
			</form>
		</div>
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
			<p>documento <a href="autoria.php">autoria</a></p>
			<p>Director: Gaston Zuñiga</p>
			<p>gestora de ventas: Mariana noemi Zuñiga</p>
		</div>
	</footer>
	<div class="contenedor" style="width: 100%;">
		<img src="Media/icono_imaguen/logo_imaguen.png">
		<p>desarrolladores de Advanced Store: Franco Agustin Ojeda Zuñiga, Tomas Agustin Zuñiga</p>
	</div>
</body>
</html>
