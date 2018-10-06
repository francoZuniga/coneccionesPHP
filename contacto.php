<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<title>Advanced Store</title>
	<!-- enlaces de los estilos-->
	<link rel="stylesheet" type="text/css" href="Css/menu.css">
	<link rel="stylesheet" type="text/css" href="Css/contacto.css">
	<script type="text/javascript" src="Js/verificar.js"></script>
	<link rel="shortcut icon" href="Media/icono_imaguen/icono_paguina.png" />
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
					<li><a href="index.php">inicio</a></li>
					<li><a href="nosotros.php">nosotros</a></li>
					<li><a href="productos.php">productos</a></li>
					<li><a href="">contacto</a></li>
				</ul>
			</nav>
	</header>

	<section>
	<!-- foemulario de envio consulta-->
		<form name="contacto" onsubmit="return validacion()" action="archivo.php" method="post">
		<!-- campo de nombre y de apellido-->
			<p>nombre y apellido: </p>
			<input type="text" name="nombre-apellido" id="nombre-apellido">
		<!-- campo de e-mail-->
			<p>tu E-mail:</p>
			<a class="tooltips" href="#"><input type="text" name="" id="email" style="" onfocus="desFoco()" onchange="email()">
			<span id="tool" style="visibility: hidden;">ERROR el campo esta vacio, o el correo no es valido</span></a>
		<!-- campo de telefono con restrccion de longitud-->
			<p>Telefono: </p>
			<p><p style="width: 40px; float: left;">+54-</p>
			 <input type="number" class="numero" maxlength="10" oninput="if(this.value.length > this.maxLength)this.value = this.value.slice(0, this.maxLength);" /></p>
		<!-- campo de consulta-->
			<p>su consulta: </p>
			<p><a class="tooltips2" href="#" style="text-decoration: none;"><textarea id="consulta" onclick="desFoco2()" style=""></textarea><span id="tool2" style="visibility: hidden;">el campo esta vacio</span></a></p>
		<!-- boton de envio de formulario-->
			<input type="submit" name="Enviar" id="enviar" value="Enviar Consulta">
		</form>
	</section>
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
	<div class="contenedor">
		<img src="Media/icono_imaguen/logo_imaguen.png">
		<p>desarrolladores de Advanced Store: Franco Agustin Ojeda Zuñiga, Tomas Agustin Zuñiga</p>
	</div>
</body>
</html>
