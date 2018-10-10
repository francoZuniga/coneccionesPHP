function fileValidation(){
    var fileInput = document.getElementById('file');
    var filePath = fileInput.value;
    var allowedExtensions = /(.jpg|.jpeg|.png|.gif)$/i;
    
    if(!allowedExtensions.exec(filePath)){
        alert('Please upload file having extensions .jpeg/.jpg/.png/.gif only.');
        fileInput.value = '';
        return false;
    }else{
       return true;
    }
}

function validar(){
    // obtenemos el valor de los inputs
    var archivo = document.getElementById('file').value;
    var nombre = document.getElementById('nombreProducto').value;
    var marca = document.getElementById('marca').value;
    var tipo = document.getElementById('tipo').selectedIndex;
    //evaluamos las condiciones de valides
    //un file vacio o sin archivo
    if (archivo == ""){
        alert("usted no a ingresado una foto:");
        return false;
    }
    //un nombre de producto vacio o con espacios en blanco
    if(nombre == null || nombre.length == 0 || nombre == "" || /^\s+$/.test(nombre)){
        alert("usted no ingreso un nombre:");
        return false;
    }
    //un marca de producto vacioa o con enpacios en blanco
    if(marca == null || marca.length == 0 || marca == "" || /^\s+$/.test(marca)){
        alert("usted no ingreso una marca:");
        return false;
    }
    //un tipo no seleccionado
    if(tipo == null || tipo == 0){
        alert("usted no selecciono un tipo:");
        return false;
    }
    //un descripcion vacia o con espacios en blanco
    return true;
}
function validarAccesorios(){
    // obtenemos el valor de los inputs
    var modelo = document.getElementById('modelo').value;
    var marca = document.getElementById('marca').value;
    var descripcion = document.getElementById('descripcion').value;
    var celulares = document.getElementById('celulares').selectedIndex;
    //evaluamos las condiciones de valide
    //un nombre de producto vacio o con espacios en blanco
    if(modelo == null || modelo.length == 0 || modelo == "" || /^\s+$/.test(modelo)){
        alert("usted no ingreso un modelo:");
        return false;
    }
    //un marca de producto vacioa o con enpacios en blanco
    if(marca == null || marca.length == 0 || marca == "" || /^\s+$/.test(marca)){
        alert("usted no ingreso una marca:");
        return false;
    }
    //un marca de producto vacioa o con enpacios en blanco
    if(descripcion == null || descripcion.length == 0 || descripcion == "" || /^\s+$/.test(descripcion)){
        alert("usted no ingreso una descipcion:");
        return false;
    }
    //un marca de producto vacioa o con enpacios en blanco
    if(celulares == null || celulares.length == 0 || celulares == "" || /^\s+$/.test(celulares)){
        alert("usted no ingreso una celular:");
        return false;
    }
    //un descripcion vacia o con espacios en blanco
    return true;
}
function validarAudio(){
    // obtenemos el valor de los inputs
    var modelo = document.getElementById('modelo').value;
    var marca = document.getElementById('marca').value;
    var descripcion = document.getElementById('descripcion').value;
    var conectividad = document.getElementById('celulares').selectedIndex;
    //evaluamos las condiciones de valide
    //un nombre de producto vacio o con espacios en blanco
    if(modelo == null || modelo.length == 0 || modelo == "" || /^\s+$/.test(modelo)){
        alert("usted no ingreso un nombre:");
        return false;
    }
    //un marca de producto vacioa o con enpacios en blanco
    if(marca == null || marca.length == 0 || marca == "" || /^\s+$/.test(marca)){
        alert("usted no ingreso una marca:");
        return false;
    }
    //un marca de producto vacioa o con enpacios en blanco
    if(descripcion == null || descripcion.length == 0 || descripcion == "" || /^\s+$/.test(descripcion)){
        alert("usted no ingreso una marca:");
        return false;
    }
    //un marca de producto vacioa o con enpacios en blanco
    if(conectividad == null || conectividad.length == 0 || conectividad == "" || /^\s+$/.test(conectividad)){
        alert("usted no ingreso una marca:");
        return false;
    }
    //un descripcion vacia o con espacios en blanco
    return true;
}
function validarVariedad(){
    // obtenemos el valor de los inputs
    var modelo = document.getElementById('modelo').value;
    var marca = document.getElementById('marca').value;
    var descripcion = document.getElementById('descripcion').value;
    //evaluamos las condiciones de valide
    //un nombre de producto vacio o con espacios en blanco
    if(modelo == null || modelo.length == 0 || modelo == "" || /^\s+$/.test(modelo)){
        alert("usted no ingreso un nombre:");
        return false;
    }
    //un marca de producto vacioa o con enpacios en blanco
    if(marca == null || marca.length == 0 || marca == "" || /^\s+$/.test(marca)){
        alert("usted no ingreso una marca:");
        return false;
    }
    //un marca de producto vacioa o con enpacios en blanco
    if(descripcion == null || descripcion.length == 0 || descripcion == "" || /^\s+$/.test(descripcion)){
        alert("usted no ingreso una marca:");
        return false;
    }
    return true;
}