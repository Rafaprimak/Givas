<?php
    echo "Exercicio 1";
    echo "<br>";
    //substituir todas as vogais de uma string por asteriscos
    $string = "testando os asteriscos";
    $vogais = array("a", "e", "i", "o", "u");
    $string = str_replace($vogais, "*", $string);
    echo $string;
    echo "<br>";
    echo "---------------------------------";



    echo "<br>";
    echo "Exercicio 2";
    echo "<br>";
    //verificar se um numero é primo ou não
    $numero = 7;
    if ($numero % 2 == 0) {
        echo "O número $numero não é primo";
    } else {
        echo "O número $numero é primo";
    }
    echo "<br>";
    echo "---------------------------------";


    
    echo "<br>";
    echo "Exercicio 3";
    echo "<br>";
    //inverter uma string sem usar a função strrev()
    $string = "inverter";
    $stringInvertida = "";
    for ($i = strlen($string) - 1; $i >= 0; $i--) {
        $stringInvertida .= $string[$i];
    }
    echo $string;
    echo $stringInvertida;
    echo "<br>";
    echo "---------------------------------";



    echo "<br>";
    echo "Exercicio 4";
    echo "<br>";
    //criar uma função que receba um numero e retorne se é positivo, negativo ou zero
    function verificarNumero($numero) {
        if ($numero > 0) {
            return "O número $numero é positivo";
        } else if ($numero < 0) {
            return "O número $numero é negativo";
        } else {
            return "O número $numero é zero";
        }
    }
    echo verificarNumero(0);
    echo "<br>";
    echo "---------------------------------";



    echo "<br>";
    echo "Exercicio 5";
    echo "<br>";
    //conte o numero de palavras em uma frase e imprima cada palavra em uma nova linha
    $frase = "conte o numero de palavras da frase";
    $palavras = explode(" ", $frase);
    echo count($palavras);
    echo "<br>";
    foreach ($palavras as $palavra) {
        echo $palavra;
        echo "<br>";
    }
    echo "---------------------------------";



    echo "<br>";
    echo "Exercicio 6";
    echo "<br>";
    //crie uma funcao que verifique se uma palavra é um palindromo
    function verificarPalindromo($palavra) {
        $palavraInvertida = "";
        for ($i = strlen($palavra) - 1; $i >= 0; $i--) {
            $palavraInvertida .= $palavra[$i];
        }
        if ($palavra == $palavraInvertida) {
            return "A palavra $palavra é um palindromo";
        } else {
            return "A palavra $palavra não é um palindromo";
        }
    }
    echo verificarPalindromo("arara");
    echo "<br>";
    echo "---------------------------------";



    echo "<br>";
    echo "Exercicio 7";
    echo "<br>";
    //crie um programa que imprima os numeros de 1 a 20 substituindo multiplos de 3 por ?
    for ($i = 1; $i <= 20; $i++) {
        if ($i % 3 == 0) {
            echo "?";
        } else {
            echo $i;
        }
    }
    echo "<br>";
    echo "---------------------------------";



    echo "<br>";
    echo "Exercicio 8";
    echo "<br>";
    //crie uma funcao que remova os espaços em branco de uma string
    function removerEspacos($string) {
        return str_replace(" ", "", $string);
    }
    echo removerEspacos("remover os espacos");
    echo "<br>";
    echo "---------------------------------";



    echo "<br>";
    echo "Exercicio 9";
    echo "<br>";
    //crie um programa que calcule e imprima os numeros fibonacci ate o decimo termo
    $termo1 = 0;
    $termo2 = 1;
    $termo3 = 0;
    $pularLinha = "<br>";
    echo $termo1 . $pularLinha;
    echo $termo2 . $pularLinha;
    for ($i = 3; $i <= 10; $i++) {
        $termo3 = $termo1 + $termo2;
        echo $termo3 . $pularLinha;
        $termo1 = $termo2;
        $termo2 = $termo3;
    }
    echo "<br>";
    echo "---------------------------------";



    echo "<br>";
    echo "Exercicio 10";
    echo "<br>";
    //crie uma funcao que receba um texto e retorne se é um pangrama
    function verificarPangrama($texto) {
        $alfabeto = "abcdefghijklmnopqrstuvwxyz";
        $texto = strtolower($texto);
        for ($i = 0; $i < strlen($alfabeto); $i++) {
            if (strpos($texto, $alfabeto[$i]) === false) {
                return "O texto não é um pangrama";
            }
        }
        return "O texto é um pangrama";
    }
    echo verificarPangrama("abcdefghijklmnopqrstuvwxyz");


?>