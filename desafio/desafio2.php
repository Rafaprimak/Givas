<?php
    echo "-----------------------------------------";
    echo "<br>";
    echo "Exercicio 2";
    echo "<br>";
    echo "<br>";
    //Ler 10 numeros e imprimir quantos sao pares e quantos sao impares
    $pares = 0;
    $impares = 0;

    for ($i = 1; $i <= 10; $i++) {
        $numero = $_GET["numero$i"];
        
        if ($numero % 2 == 0) {
            $pares++;
        } else {
            $impares++;
        }
    }
    
    echo "<br>";
    echo "Quantidade de números pares: $pares";
    echo "<br>";
    echo "Quantidade de números ímpares: $impares";

?>