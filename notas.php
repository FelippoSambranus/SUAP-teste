<?php
$matricula = $_POST['matricula'];
$turma = $_POST['turma'];
$disciplina = $_POST['disciplina'];
$nota1 = floatval($_POST['nota1']);
$nota2 = floatval($_POST['nota2']);
$nota3 = floatval($_POST['nota3']);

$media = ($nota1 + $nota2 + $nota3)/3;
$relacao = $media >= 6? "Aprovado" : "Reprovado";
$caminho = "{$disciplina}_{$turma}.txt";
$arquivo = fopen("Notas/{$caminho}", "a");
if ($arquivo) {

    $dadosAluno = "<tr>
            <td>{$matricula}</td>
            <td>{$nota1}</td>
            <td>{$nota2}</td>
            <td>{$nota3}</td>
            <td>{$media}</td>
            <td>{$relacao}</td>
        </tr>";

    fwrite($arquivo, $dadosAluno);
    fclose($arquivo);
} else {
    echo "<p>Arquivo não aberto ou criado!</p>";
}
header("Location: notas.html");
?>