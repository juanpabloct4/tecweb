<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>Práctica 3</title>
</head>
<body>
    <h2>Ejercicio 1</h2>
    <p>Determina cuál de las siguientes variables son válidas y explica por qué:</p>
    <p>$_myvar,  $_7var,  myvar,  $myvar,  $var7,  $_element1, $house*5</p>
    <?php
        //AQUI VA MI CÓDIGO PHP
        $_myvar;
        $_7var;
        //myvar;       // Inválida
        $myvar;
        $var7;
        $_element1;
        //$house*5;     // Invalida
        
        echo '<h4>Respuesta:</h4>';   
    
        echo '<ul>';
        echo '<li>$_myvar es válida porque inicia con guión bajo.</li>';
        echo '<li>$_7var es válida porque inicia con guión bajo.</li>';
        echo '<li>myvar es inválida porque no tiene el signo de dolar ($).</li>';
        echo '<li>$myvar es válida porque inicia con una letra.</li>';
        echo '<li>$var7 es válida porque inicia con una letra.</li>';
        echo '<li>$_element1 es válida porque inicia con guión bajo.</li>';
        echo '<li>$house*5 es inválida porque el símbolo * no está permitido.</li>';
        echo '</ul>';
    ?>

    <h2>Ejercicio 2</h2>
    <p>Proporcionar los valores de $a, $b, $c como sigue:</p>
    <p>$a = "ManejadorSQL"; <br> $b = 'MySQL'; <br> $c = &$a;</p>
    <p>a. Ahora muestra el contenido de cada variable:</p>
    <?php
        $a = "ManejadorSQL";
        $b = 'MySQL';
        $c = &$a;

        echo '<h4>Respuesta:</h4>';
        echo '<ul>';
        echo "<li>$a</li>";
        echo "<li>$b</li>";
        echo "<li>$c</li>";
        echo '</ul>';
    ?>
    <p>b. Agrega al código actual las siguientes asignaciones:</p>
    <p>$a = "PHP server"; <br> $b = &$a;</p>
    <p>c. Vuelve a mostrar el contenido de cada uno</p>
    <?php
        $a = "PHP server";
        $b = &$a;
        $c = &$a;
        
        echo '<h4>Respuesta:</h4>';
        echo '<ul>';
        echo "<li>$a</li>";
        echo "<li>$b</li>";
        echo "<li>$c</li>";
        echo '</ul>';
    ?>
    <p>d. Describe y muestra en la página obtenida qué ocurrió en el segundo bloque de asignaciones</p>
    <p>Tanto como la variable $b y $c tiene como referencia la variable $a, por eso las tres variables tiene PHP server</p>


    <h2>Ejercicio 3</h2>
    <p>Muestra el contenido de cada variable inmediantamente después de cada asignación, verificar la evolución
        del tipo de estas variables (imprime todos los componentes de los arreglo):</p>
    <p>$a = "PHP5"; <br> $z[] = &$a; <br>$b = "5a version de PHP"; <br> $c = $b*10; <br> $a .= $b; <br> $b *= $c; <br> $z[0] = "MySQL";</p>

    <?php
        echo '<h4>Respuesta</h4>';
        echo '<ul>';
        $a = "PHP5";
        echo "<li>\$a = $a</li>";
        $z[] = &$a;
        echo "<li>\$z[0] = $z[0]</li>";
        $b = "5a version de PHP";
        echo "<li>\$b = $b</li>";
        @$c = $b*10;
        echo "<li>\$c = $c</li>";
        $a .= $b; //.= pega el contenido de $b al final de $a
        echo "<li>\$a = $a</li>";
        $b *= $c; //$b = $b * $c
        echo "<li>\$b = $b</li>";
        $z[0] = "MySQL";
        echo "<li>\$z[0] = $z[0]</li>";
        echo '</ul>';
    ?>

    <h2>Ejercicio 4</h2>
    <p>Lee y muestra los valores de las variables del ejercicio anterior, pero ahora con la ayuda de la matriz $GLOBALS
        o del modificador global de PHP </p>
    
    <?php
        echo '<h4>Respuesta</h4>';
        echo '<ul>';
        $a = "PHP5";
        echo '<li>$a = '. $GLOBALS['a'] .'</li>';
        $z[] = &$a;
        echo '<li>$z[0] = '. $GLOBALS['z'][0] .'</li>';
        $b = "5a version de PHP";
        echo '<li>$b ='. $GLOBALS['b'] .'</li>';
        @$c = $b*10;
        echo '<li>$c ='. $GLOBALS['c'] .'</li>';
        $a .= $b;
        echo '<li>$a ='. $GLOBALS['a'] .'</li>';
        $b *= $c;
        echo '<li>$b ='. $GLOBALS['b'] .'</li>';
        $z[0] = "MySQL";
        echo '<li>$z[0] = '. $GLOBALS['z'][0] .'</li>';

    ?>


</body>
</html>