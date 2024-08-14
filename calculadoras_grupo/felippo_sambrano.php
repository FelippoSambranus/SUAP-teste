<?php
$vA = floatval($_POST['a']);
$vB = floatval($_POST['b']);
$vC = floatval($_POST['c']);

$delta = ($vB)**2 - (4*$vA*$vC);

if ($delta < 0) {
    echo '
    <p>Sem resultados reais para os valores informados!</p><br>
    Volte para a calculadora feleppus: <a href="felippo_sambrano.html">Voltar</a>
    ';
} else {

    $x1 = ((-$vB) + sqrt($delta))/(2*$vA);
    $x2 = ((-$vB) + sqrt($delta))/(2*$vA);
    $arquivo = fopen("./resultados/felippo_sambrano.txt", "a");
    $resultado = "
    Resultado: x1 = {$x1}, x2 = {$x2}
    ";
    fwrite($arquivo, $resultado);
    fclose($arquivo);

    echo "<p>Resultados salvos! x1 = {$x1} e x2 = {$x2}.</p><br>";
    echo '<a href="felippo_sambrano.html">Voltar para a calculadora</a>';
}
?>