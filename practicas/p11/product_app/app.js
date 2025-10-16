// JSON BASE A MOSTRAR EN FORMULARIO
var baseJSON = {
    "precio": 0.0,
    "unidades": 1,
    "modelo": "XX-000",
    "marca": "NA",
    "detalles": "NA",
    "imagen": "img/default.png"
  };


function validarFormulario() {
    const nombre = document.getElementById("name").value.trim();
    const jsonText = document.getElementById("description").value.trim();

    if (nombre === "" || nombre.length > 100) {
        alert("El nombre es requerido y debe tener máximo 100 caracteres.");
        return false;
    }

    let producto;
    try {
        producto = JSON.parse(jsonText);
    } catch (e) {
        alert("JSON inválido en la descripción.");
        return false;
    }

    if (!producto.marca || producto.marca.trim() === "") {
        alert("Debe especificar una marca en el JSON.");
        return false;
    }

    if (!producto.modelo || producto.modelo.trim() === "" || producto.modelo.length > 25) {
        alert("El modelo es requerido y debe tener máximo 25 caracteres en el JSON.");
        return false;
    }

    if (!producto.precio || parseFloat(producto.precio) <= 99.99) {
        alert("El precio debe ser mayor a 99.99 en el JSON.");
        return false;
    }

    if (producto.detalles && producto.detalles.length > 250) {
        alert("Los detalles no pueden exceder 250 caracteres en el JSON.");
        return false;
    }

    if (producto.unidades === undefined || parseInt(producto.unidades) < 0) {
        alert("Las unidades deben ser un número mayor o igual a 0 en el JSON.");
        return false;
    }

    if (!producto.imagen || producto.imagen.trim() === "") {
        producto.imagen = "img/default.png";
    }

    return true;
}


// FUNCIÓN CALLBACK DE BOTÓN "Buscar"
function buscarID(e) {
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
                let descripcion = '';
                    descripcion += '<li>precio: '+productos.precio+'</li>';
                    descripcion += '<li>unidades: '+productos.unidades+'</li>';
                    descripcion += '<li>modelo: '+productos.modelo+'</li>';
                    descripcion += '<li>marca: '+productos.marca+'</li>';
                    descripcion += '<li>detalles: '+productos.detalles+'</li>';
                
                // SE CREA UNA PLANTILLA PARA CREAR LA(S) FILA(S) A INSERTAR EN EL DOCUMENTO HTML
                let template = '';
                    template += `
                        <tr>
                            <td>${productos.id}</td>
                            <td>${productos.nombre}</td>
                            <td><ul>${descripcion}</ul></td>
                        </tr>
                    `;

                // SE INSERTA LA PLANTILLA EN EL ELEMENTO CON ID "productos"
                document.getElementById("productos").innerHTML = template;
            }
        }
    };
    client.send("id="+id);
}


function buscarProducto(e) {
    e.preventDefault();

    var termino = document.getElementById('search').value;

    var client = getXMLHttpRequest();
    client.open('POST', './backend/read.php', true);
    client.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    client.onreadystatechange = function () {
        if (client.readyState == 4 && client.status == 200) {
            console.log('[CLIENTE - buscarProducto]\n'+client.responseText);

            let productos = JSON.parse(client.responseText);

            if (Array.isArray(productos) && productos.length > 0) {
                let template = '';

                productos.forEach(p => {
                    let descripcion = '';
                    descripcion += '<li>precio: '+p.precio+'</li>';
                    descripcion += '<li>unidades: '+p.unidades+'</li>';
                    descripcion += '<li>modelo: '+p.modelo+'</li>';
                    descripcion += '<li>marca: '+p.marca+'</li>';
                    descripcion += '<li>detalles: '+p.detalles+'</li>';

                    template += `
                        <tr>
                            <td>${p.id}</td>
                            <td>${p.nombre}</td>
                            <td><ul>${descripcion}</ul></td>
                        </tr>
                    `;
                });

                document.getElementById("productos").innerHTML = template;
            } else {
                document.getElementById("productos").innerHTML = `<tr><td colspan="3">No se encontraron productos.</td></tr>`;
            }
        }
    };
    client.send("id=" + termino);
}

// FUNCIÓN CALLBACK DE BOTÓN "Agregar Producto"
function agregarProducto(e) {
    e.preventDefault(); //Esto evita que se recargue la página

    if (!validarFormulario()) return; // Detiene si la validación falla

    const nombre = document.getElementById("name").value.trim();
    const productoJson = JSON.parse(document.getElementById("description").value);

    // Añadir el nombre al JSON
    productoJson.nombre = nombre;

    const jsonString = JSON.stringify(productoJson, null, 2);

    const client = getXMLHttpRequest();
    client.open('POST', './backend/create.php', true);
    client.setRequestHeader('Content-Type', "application/json;charset=UTF-8");
    client.onreadystatechange = function () {
        if (client.readyState == 4 && client.status == 200) {
            alert(client.responseText); // ⬅️ Mostrar mensaje de éxito o error
            document.getElementById("task-form").reset(); // limpiar formulario
        }
    };
    client.send(jsonString);
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