function validacion(){
	//obtenemos los valores de los campos obligatorios
	var email = document.getElementById('email').value;
	var consulta = document.getElementById('consulta').value;
	//evaluamos si el e-mail es valido, y no este vacio o el e-mail es correcto
	emailRegex = /^[-\w.%+]{1,64}@(?:[A-Z0-9-]{1,63}\.){1,125}[A-Z]{2,63}$/i;
	if (email==null || email.length == 0) {
		//aparece los tooltips
		document.getElementById('email').setAttribute("style", "box-shadow: 0px 0px 12px 0px rgba(255,97,97,1);");
		document.getElementById('tool').setAttribute("style", "visibility: visible;");
		return false;
	}
	//evaluamos que el campo no este vacio
	 if (consulta == null || consulta.length == 0) {
	//aparece los tooltips
		document.getElementById('consulta').setAttribute("style", "box-shadow: 0px 0px 12px 0px rgba(255,97,97,1);");
		document.getElementById('tool2').setAttribute("style", "visibility: visible;");
		return false;
	}
	return true;
}
//desaparce los tooltips
function desFoco(){
	//vacia el input
	document.getElementById('email').value="";
	//mostramos la falla
	document.getElementById('email').setAttribute("style", "box-shadow: none;");
	document.getElementById('tool').setAttribute("style", "visibility: hidden;");
}
function desFoco2(){
	//mostramos la falla
	document.getElementById('consulta').setAttribute("style", "box-shadow: none;");
	document.getElementById('tool2').setAttribute("style", "visibility: hidden;");
}
function email(){
	//evaluamos el email
	var email = document.getElementById('email').value;


    var email = document.getElementById('email');
    var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;

    if (!filter.test(email.value)) {
    alert('Please provide a valid email address');
    email.focus;
    return false;
 }
}
