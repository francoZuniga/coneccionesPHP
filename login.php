<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>login Advanced Store</title>
	<link rel="stylesheet" type="text/css" href="Css/login.css">
</head>
<body>
	<?php
	//cerramos la session que se inicio
		session_start();
		session_destroy();
	?>
	<section>
		<div class="formualrio">
			<form action="scriptLogin.php" method="post">
				<img src="Media/icono_imaguen/logo_imaguen.png">
				<input type="text" name="usuario" placeholder=" usuario">
				<input type="password" name="password" placeholder=" contraseña">
				<input type="submit" name="" value="Entrar" class="enviar">
			</form>
		</div>
	</section>
</body>
</html>
