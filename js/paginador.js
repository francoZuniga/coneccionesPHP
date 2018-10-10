//creamos el algoritmo de la paginacion
 var pagina = document.getElementById("indicador").value;
 var total = document.getElementById("total").value;
//convertimos el valor de las variables que nos entran en enteros

pagina = parseInt(pagina);
total = parseInt(total);


if (pagina == 1) {
	//eliminamos las paginas mayores a 3
	for (var i = pagina + 3; i <= total; i++) {
			document.getElementById(i).setAttribute("style", "display: none;");
		}
		document.getElementById(pagina).setAttribute("style", "background-color: #e1381c;");
}
else{
	if (pagina == 2) {
		//si estamos en la pagina 2 la resaltamos
		document.getElementById(pagina).setAttribute("style", "background-color: #e1381c;");
		//eliminamos las paginas mayores a 3
		for (var i = pagina + 3; i <= total; i++) {
			document.getElementById(i).setAttribute("style", "display: none;");
		}
	}
	else{
		if (pagina>=3 || pagina<=total-3) {
			//si estamos en alguna pagina se eliminan las que estan desde la uno asta dos anteriores de la pagina actual
			for (var i = 1; i < pagina-2 ; i++) {
				document.getElementById(i).setAttribute("style", "display: none;");
			}
			//resaltamos la pagina actual
			document.getElementById(pagina).setAttribute("style", "background-color: #e1381c;")
			//eliminamos la paginas que estan desde dos posiciones adelante desde la pagina actual 
			for (var i = total; i > pagina+2 ; i--) {
				document.getElementById(i).setAttribute("style", "display: none;");
			}
		}
		else{
			if (pagina == total-2) {
				//eliminamos las paginas menores a total-5
				for (var i=1; i <= total-5; i++) {
					document.getElementById(i).setAttribute("style", "display: none;");
				}
				document.getElementById(pagina).setAttribute("style", "background-color: #e1381c;");
			}
			else{
				if (pagina == total-1) {
					for (var i=1; i <= total-5; i++) {
						document.getElementById(i).setAttribute("style", "display: none;");
					}
					document.getElementById(pagina).setAttribute("style", "background-color: #e1381c;");
				}
				else{
					if (pagina == total) {
						for (var i=1; i <= total-5; i++) {
							document.getElementById(i).setAttribute("style", "display: none;");
						}
						document.getElementById(pagina).setAttribute("style", "background-color: #e1381c;");
					}
				}
			}
		}
	}
}