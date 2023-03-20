
// JSON BASE A MOSTRAR EN FORMULARIO
var baseJSON = {
    "precio": 0.0,
    "unidades": 1,
    "modelo": "XX-000",
    "marca": "NA",
    "detalles": "NA",
    "imagen": "img/default.png"
  };

// FUNCIÓN CALLBACK DE BOTÓN "Buscar"
function buscarID(e) {
    alert("uno o varios de los datos ingresados son incorrectos. Vea los detalles: \n"+"precio no numerico"); 
    /**
     * Revisar la siguiente información para entender porqué usar event.preventDefault();
     * http://qbit.com.mx/blog/2013/01/07/la-diferencia-entre-return-false-preventdefault-y-stoppropagation-en-jquery/#:~:text=PreventDefault()%20se%20utiliza%20para,escuche%20a%20trav%C3%A9s%20del%20DOM
     * https://www.geeksforgeeks.org/when-to-use-preventdefault-vs-return-false-in-javascript/
     */
    e.preventDefault();

    // SE OBTIENE EL ID A BUSCAR
    var id = document.getElementById('search').value;

    // SE CREA EL OBJETO DE CONEXIÓN ASÍNCRONA AL SERVIDOR
    var client = getXMLHttpRequest();
    client.open('POST', './backend/read.php', true);
    client.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    client.onreadystatechange = function () {
        // SE VERIFICA SI LA RESPUESTA ESTÁ LISTA Y FUE SATISFACTORIA
        if (client.readyState == 4 && client.status == 200) {
            console.log('[CLIENTE]\n'+client.responseText);
            
            // SE OBTIENE EL OBJETO DE DATOS A PARTIR DE UN STRING JSON
            let productos = JSON.parse(client.responseText);    // similar a eval('('+client.responseText+')');
            
            // SE VERIFICA SI EL OBJETO JSON TIENE DATOS
            if(Object.keys(productos).length > 0) {
                // SE CREA UNA LISTA HTML CON LA DESCRIPCIÓN DEL PRODUCTO
                let tam=Object.keys(productos).length;
                    let descripcion = '';
                    let template = '';
                    
                    for(var i=0; i<tam; i++){
                        descripcion="";
                        template="";

                        descripcion += '<li>precio: '+productos[i].precio+'</li>';
                        descripcion += '<li>unidades: '+productos[i].unidades+'</li>';
                        descripcion += '<li>modelo: '+productos[i].modelo+'</li>';
                        descripcion += '<li>marca: '+productos[i].marca+'</li>';
                        descripcion += '<li>detalles: '+productos[i].detalles+'</li>';

                        template += `
                            <tr>
                                <td>${productos[i].id}</td>
                                <td>${productos[i].nombre}</td>
                                <td><ul>${descripcion}</ul></td>
                            </tr>
                        `;
                        document.getElementById("productos").innerHTML += template;
                    }
            }
        }
    };
    client.send("id="+id);
}

//funcion para saber si algo es alfanumerico
function isalphanum(str) {
    var code, i, len;
    var isNumeric = false, isAlpha = false; // I assume that it is all non-alphanumeric

    for (i = 0, len = str.length; i < len; i++) {
        code = str.charCodeAt(i);

        switch (true) {
        case code > 47 && code < 58: // check if 0-9
            isNumeric = true;
            break;
        case (code > 64 && code < 91) || (code > 96 && code < 123): // check if A-Z or a-z
            isAlpha = true;
            break;

        default:
            return false;
        }
    }
return isNumeric && isAlpha;
}

// FUNCIÓN CALLBACK DE BOTÓN "Agregar Producto"
function agregarProducto(e) {
    
    var verificado=true;
    e.preventDefault();
    error="";
    
    // SE OBTIENE DESDE EL FORMULARIO EL JSON A ENVIAR
    var productoJsonString = document.getElementById('description').value;
    // SE CONVIERTE EL JSON DE STRING A OBJETO
    var finalJSON = JSON.parse(productoJsonString);
    // SE AGREGA AL JSON EL NOMBRE DEL PRODUCTO
    finalJSON['nombre'] = document.getElementById('name').value;

    //TODO: AQUI HACER LAS COMPROBACIONES, SI SE CUMOLEN SE SIGUE 
    //CONDICIONES:
    /*
    a. El nombre debe ser requerido y tener 100 caracteres o menos.
b. La marca debe ser requerida 
c. El modelo debe ser requerido, texto alfanumérico y tener 25 caracteres o menos.
d. El precio debe ser requerido 
e. Los detalles deben ser opcionales y, de usarse, deben tener 250 caracteres o menos.
f. Las unidades deben ser requeridas y el número registrado debe ser mayor o igual a 0.
g. La ruta de la imagen debe ser opcional, pero en caso de no registrarse se debe usar la
ruta de una imagen por defecto (ver ejemplo): LA COSAESTA ES /img/default.png 
    */
   var nom=finalJSON['nombre'];
   var mar=finalJSON['marca'];
   var mod=finalJSON['modelo'];
   var pre=finalJSON['precio'];
   var det=finalJSON['detalles'];
   var uni=finalJSON['unidades'];
   var rut=finalJSON['imagen'];

    if(nom.length > 100 || nom.length === 0){
        error+="nombre muy largo o muy corto\n";
        verificado=false;
    }
    if(mar==null){
        error+="No se introdujo una marca\n";
        verificado=false;
    }
    if(!isalphanum(mod) || mod.length===0){
        error+="modelo no alfanumerico o vacio\n";
        verificado=false;
    }
    pr=parseFloat(pre);
    if(pr===0.0 || pre.length===0){
        error+="precio no numerico\n";
        verificado=false;
    }
    if(det.length>=250){
        error+="detalles muy largos\n";
        verificado=false;
    }
    if(parseInt(uni)==0){
        error+="unidades no numericas\n";
        verificado=false;
    }
    if(rut.length===0){
        finalJSON['imagen']="img/placeholder.png";
    }

    if(verificado==true){
        productoJsonString = JSON.stringify(finalJSON,null,2);

        // SE CREA EL OBJETO DE CONEXIÓN ASÍNCRONA AL SERVIDOR
        var client = getXMLHttpRequest();
        client.open('POST', './backend/create.php', true);
        client.setRequestHeader('Content-Type', "application/json;charset=UTF-8");
        client.onreadystatechange = function () {
            // SE VERIFICA SI LA RESPUESTA ESTÁ LISTA Y FUE SATISFACTORIA
            }
            if (client.readyState == 4 && client.status == 200) {
                console.log(client.responseText);
            }
        
        client.send(productoJsonString);
    }
    else{
        window.alert("uno o varios de los datos ingresados son incorrectos. Vea los detalles: \n"+error)
    }
    

    //if(finalJSON['nombre']==)
}

// SE CREA EL OBJETO DE CONEXIÓN COMPATIBLE CON EL NAVEGADOR
function getXMLHttpRequest() {
    var objetoAjax;

    try{
        objetoAjax = new XMLHttpRequest();
    }catch(err1){
        /**
         * NOTA: Las siguientes formas de crear el objeto ya son obsoletas
         *       pero se comparten por motivos historico-académicos.
         */
        try{
            // IE7 y IE8
            objetoAjax = new ActiveXObject("Msxml2.XMLHTTP");
        }catch(err2){
            try{
                // IE5 y IE6
                objetoAjax = new ActiveXObject("Microsoft.XMLHTTP");
            }catch(err3){
                objetoAjax = false;
            }
        }
    }
    return objetoAjax;
}

function init() {
    /**
     * Convierte el JSON a string para poder mostrarlo
     * ver: https://developer.mozilla.org/es/docs/Web/JavaScript/Reference/Global_Objects/JSON
     */
    var JsonString = JSON.stringify(baseJSON,null,2);
    document.getElementById("description").value = JsonString;
}