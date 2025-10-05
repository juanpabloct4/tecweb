function getDatos()
{
    var nombre = prompt("Nombre: ", "");

    var edad = prompt("Edad: ", 0);

    var div1 = document.getElementById('nombre');
    div1.innerHTML = '<h3> Nombre: '+nombre+'</h3>';

    var div2 = document.getElementById('edad');
    div2.innerHTML = '<h3> Edad: '+edad+'</h3>';
}

function ejemplo1(){
    var div = document.getElementById('resultado1');
    div.innerHTML = '<h4 style="color:blue;">Hola Mundo</h4>';
}

function ejemplo2(){
    var nombre = 'Juan';
    var edad = 10;
    var altura = 1.92;
    var casado = false;

    var div = document.getElementById('resultado2');
    div.innerHTML = '<h4 style="color:blue;">' + nombre + '<br>' + edad + '<br>' + altura + '<br>' + casado + '</h4>';
}

function ejemplo3(){
    var nombre = prompt('Ingresa tu  nombre:', '');
    var edad = prompt('Ingresa tu edad', '');

    var div = document.getElementById('resultado3');
    div.innerHTML = '<h4 style="color:blue;">Hola ' + nombre + ' asi que tienes ' + edad + ' años</h4>';
}

function ejemplo4(){
    var valor1 = prompt('Introducir primer número:', '');
    var valor2 = prompt('Introducir segudo número:', '');
    var suma = parseInt(valor1) + parseInt(valor2);
    var producto = parseInt(valor1) * parseInt(valor2);

    var div = document.getElementById('resultado4');
    div.innerHTML = '<h4 style="color:blue;">La suma es ' + suma + '<br>' + 'El producto es ' + producto + '</h4>';
}

function ejemplo5(){
    var nombre = prompt('Ingresa tu nombre:', '');
    var nota = prompt('Ingresa tu nota: ', '');

    var div = document.getElementById('resultado5');

    if(nota >= 4){
        div.innerHTML = '<h4 style="color:blue;">' + nombre + ' esta aprobado con un ' + nota + '</h4>';
    }
}

function ejemplo6(){
    var num1 = prompt('Ingresa el primer número:', '');
    var num2 = prompt('Ingresa el segundo número:', '');
    num1 = parseInt(num1);
    num2 = parseInt(num2);

    var div = document.getElementById('resultado6');

    if(num1 > num2){
        div.innerHTML = '<h4 style="color:blue;">el mayor es ' + num1 + '</h4>';
    }else{
        div.innerHTML = '<h4 style="color:blue;">el mayor es ' + num2 + '</h4>';
    }
}

function ejemplo7(){
    var nota1 = prompt('Ingresa 1ra. nota:', '');
    var nota2 = prompt('Ingresa 2da. nota:', '');
    var nota3 = prompt('Ingresa 3ra. nota:', '');
    nota1 = parseInt(nota1);
    nota2 = parseInt(nota2);
    nota3 = parseInt(nota3);
    var pro = (nota1 + nota2 + nota3) / 3;

    var div = document.getElementById('resultado7');

    if(pro >= 7){
        div.innerHTML = '<h4 style="color:blue;">Aprobado</h4>';
    }else{
        if(pro >= 4){
            div.innerHTML = '<h4 style="color:blue;">Regular</h4>';
        }else{
            div.innerHTML = '<h4 style="color:blue;">Reprobado</h4>';
        }
    }
}

function ejemplo8(){
    var valor = prompt('Ingresa un valor comprendido entre 1 y 5:', '');
    valor = parseInt(valor);

    var div = document.getElementById('resultado8');

    switch(valor){
        case 1:
            div.innerHTML = '<h4 style="color:blue;">uno</h4>';
            break;
        case 2:
            div.innerHTML = '<h4 style="color:blue;">dos</h4>';
            break;
        case 3:
            div.innerHTML = '<h4 style="color:blue;">tres</h4>';
            break;
        case 4:
            div.innerHTML = '<h4 style="color:blue;">cuatro</h4>';
            break;
        case 5:
            div.innerHTML = '<h4 style="color:blue;">cinco</h4>';
            break;
        default:
            div.innerHTML = '<h4 style="color:red;">Debe ingresar un valor comprendido entre 1 y 5</h4>';
    }
}

function ejemplo9(){
    var col = prompt('Ingresa el color con que quiera pintar el fondo de la ventana (rojo, verde, azul)', '');
    switch(col){
        case 'rojo':
            document.bgColor='#ff0000';
            break;
        case 'verde':
            document.bgColor='#00ff00';
            break;
        case 'azul':
            document.bgColor='#0000ff';
            break;            
    }
}

function ejemplo10(){
    var x = 1;
    var div = document.getElementById('resultado10');
    while(x <= 100){
        div.innerHTML += '<h4 style="color:blue;">' + x + '<br></h4>';
        x = x + 1;
    }
}

function ejemplo11(){
    var x = 1;
    var suma = 0;
    var valor;
    while(x <= 5){
        valor = prompt('Ingresa el valor:', '');
        valor = parseInt(valor);
        suma = suma + valor;
        x = x + 1;
    }
    var div = document.getElementById('resultado11');
    div.innerHTML += '<h4 style="color:blue;">La suma de los valores es ' + suma + '<br></h4>';
}

function ejemplo12(){
    var valor;

    var div = document.getElementById('resultado12');

    do{
        valor = prompt('Ingresa un valor entre 0 y 999:', '');
        valor = parseInt(valor);
        if(valor < 10){
            div.innerHTML += '<h4 style="color:blue;">El valor ' + valor + ' tiene 1 dígito</h4>';
        }else{
            if(valor < 100){
                div.innerHTML += '<h4 style="color:blue;">El valor ' + valor + ' tiene 2 dígitos</h4>';
            }else{
                div.innerHTML += '<h4 style="color:blue;">El valor ' + valor + ' tiene 3 dígitos</h4>';
            }
        }
    }while(valor != 0);
}

function ejemplo13(){
    var f;
    var div = document.getElementById('resultado13');
    for(f = 1; f <= 10; f++){
        div.innerHTML += '<span style="color:blue;">' + f + ' </span>';
    }
}

function ejemplo14(){
    var div = document.getElementById('resultado14');
    div.innerHTML += '<h4 style="color:blue;">Cuidado</h4>';
    div.innerHTML += '<h4 style="color:blue;">Ingresa tu documento correctamente</h4>';
    div.innerHTML += '<h4 style="color:blue;">Cuidado</h4>';
    div.innerHTML += '<h4 style="color:blue;">Ingresa tu documento correctamente</h4>';
    div.innerHTML += '<h4 style="color:blue;">Cuidado</h4>';
    div.innerHTML += '<h4 style="color:blue;">Ingresa tu documento correctamente</h4>';
}

function mostrarMensaje(){
    var div = document.getElementById('resultado15');
    div.innerHTML += '<h4 style="color:blue;">Cuidado</h4>';
    div.innerHTML += '<h4 style="color:blue;">Ingresa tu documento correctamente</h4>';
}

function ejemplo15(){
    mostrarMensaje();
    mostrarMensaje();
    mostrarMensaje();
}

function mostrarRango(x1, x2){
    var inicio;
    var div = document.getElementById('resultado16');
    for(inicio = x1; inicio <= x2; inicio++){
        div.innerHTML += '<h4 style="color:blue;">' + inicio + '</h4>';
    }
}

function ejemplo16(){
    var valor1 = prompt('Ingresa el valor inferior:', '');
    var valor1 = parseInt(valor1);
    var valor2 = prompt('Ingresa el valor superior:', '');
    var valor2 = parseInt(valor2);
    mostrarRango(valor1,valor2);
}

function convertirCastellano(x){
    if(x==1)
        return "uno";
    else
        if(x==2)
            return "dos";
        else
            if(x==3)
                return "tres";
            else
                if(x==4)
                    return "cuatro";
                else
                    if(x==5)
                        return "cinco";
                    else
                       return "valor incorrecto";
}

function ejemplo17(){
    var valor = prompt("Ingresa un valor entre 1 y 5", "");
    valor = parseInt(valor);
    var r = convertirCastellano(valor);
    var div = document.getElementById('resultado17');
    div.innerHTML = '<h4 style="color:blue;">' + r + '</h4>';
}

function convertirCastellano2(x) {
    switch (x) {
        case 1: return "uno";
        case 2: return "dos";
        case 3: return "tres";
        case 4: return "cuatro";
        case 5: return "cinco";
        default: return "valor incorrecto";
    }
}

function ejemplo18(){
    var valor = prompt("Ingresa un valor entre 1 y 5", "");
    valor = parseInt(valor);
    var r = convertirCastellano2(valor);
    var div = document.getElementById('resultado18');
    div.innerHTML = '<h4 style="color:blue;">' + r + '</h4>';
}
