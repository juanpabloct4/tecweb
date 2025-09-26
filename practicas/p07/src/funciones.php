<?php
    function Multiplo5y7(){
       if(isset($_GET['numero']))
        {
            $num = $_GET['numero'];
            if ($num%5==0 && $num%7==0)
            {
                echo '<h3>R= El número '.$num.' SÍ es múltiplo de 5 y 7.</h3>';
            }
            else
            {
                echo '<h3>R= El número '.$num.' NO es múltiplo de 5 y 7.</h3>';
            }
        }
    }


    function ImparParImpar() {
    $matriz = [];
    $M = 0;
    do {
        for ($j = 0; $j < 3; $j++) {
            $matriz[$M][$j] = rand(1, 1000);
        }
        $M += 1;
    } while (!($matriz[$M-1][0] % 2 != 0 && $matriz[$M-1][1] % 2 == 0 && $matriz[$M-1][2] % 2 != 0));

    foreach ($matriz as $i => $fila) { // $i es el índice de la fila
        foreach ($fila as $j => $valor) {
            // Revisamos si es la última fila
            if ($i == $M - 1) {
                if ($valor % 2 == 0) {
                    echo "<span style='color:orange;'>$valor</span> ";
                } else {
                    echo "<span style='color:blue;'>$valor</span> ";
                }
            } else {
                // Filas anteriores sin color
                echo $valor . " ";
            }
        }
        echo "<br>";
    }

    echo "<br>" . ($M)*3 . " números obtenidos en " . ($M) . " iteraciones";
    }


    function MultiploWhile(){
        if(isset($_GET['numero'])){
            $num = $_GET['numero'];
            $num_alea = 0;
            while(true){
                $num_alea = rand(1, 1000);
                if($num_alea % $num == 0){
                    break;
                }
            }
            echo "<p>R = El primer numero multiplo aleatorio de $num es: <b>$num_alea</b></p>";
        }
    }

    function MultiploDoWhile(){
        if(isset($_GET['numero'])){
            $num = $_GET['numero'];
            $num_alea = 0;

            do{
                $num_alea = rand(1, 1000);
            }while($num_alea % $num != 0);
            echo "<p>R = El primer numero multiplo aleatorio de $num es: <b>$num_alea</b></p>";
        }
    }

    function LetrasASCII(){
        $arreglo = [];

        for($i = 97; $i <= 122; $i++){
            $arreglo[$i] = chr($i);
        }

        echo '<table border="1" cellpadding="3" cellspacing="0">';
        echo '<tr><th>Índice</th><th>Letra</th></tr>';

        foreach ($arreglo as $key => $value) {
            echo '<tr>';
            echo '<td>' . $key . '</td>';
            echo '<td>' . $value . '</td>';
            echo '</tr>';
        }
        echo '</table>';
    }








?>