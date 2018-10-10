

    var imagenes=new Array(
        ['../Media/img/img1.png','http://www.advancedstore.com.ar/accesorio1'],
        ['../Media/img/img2.png','http://www.advancedstore.com.ar/accesorio2'],
        ['../Media/img/img3.png','http://www.advancedstore.com.ar/accesorio3']
    );
 
 
    function rotarImagenes()
    {
       
        var index=Math.floor((Math.random()*imagenes.length));
 
      
        document.getElementById("imagen").src=imagenes[index][0];
        document.getElementById("link").href=imagenes[index][1];
    }
 
    onload=function()
    {
       
        rotarImagenes();
 
        
        setInterval(rotarImagenes,5000);
    }