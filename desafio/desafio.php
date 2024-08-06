<?php
    echo "Exercicio 1";
    echo "<br>";
    echo "<br>";
    //Fazer um programa que solicite 2 numeros e informe:
    //A soma dos numeros
    //O produto do primeiro pelo quadrado do segundo
    //O quadrado do primeiro
    //A raiz quadrada da soma dos quadrados
    //O modulo do primeiro numero
    
?>

<form action="" method="get">
    <label for="numero1">Digite o primeiro numero:</label>
    <br>
    <input type="number" name="numero1">
    <br>
    <label for="numero2">Digite o segundo numero:</label>
    <br>
    <input type="number" name="numero2">
    <br>
    <input type="submit" value="Enviar">
</form>

<?php
if (isset($_GET['numero1']) && isset($_GET['numero2'])) {
    $numero1 = $_GET['numero1'];
    $numero2 = $_GET['numero2'];

    function soma($numero1, $numero2){
        return $numero1 + $numero2;
    }

    function produto($numero1, $numero2){
        return $numero1 * $numero2;
    }

    function quadrado($numero){
        return $numero ** 2;
    }

    function raiz($numero1, $numero2){
        return sqrt($numero1 ** 2 + $numero2 ** 2);
    }

    // Exemplo de chamada das funções
    echo "Soma: " . soma($numero1, $numero2) . "<br>";
    echo "Produto: " . produto($numero1, $numero2) . "<br>";
    echo "Quadrado do primeiro número: " . quadrado($numero1) . "<br>";
    echo "Raiz quadrada da soma dos quadrados: " . raiz($numero1, $numero2) . "<br>";
    echo "Módulo do primeiro número: " . abs($numero1) . "<br>";
}
?>