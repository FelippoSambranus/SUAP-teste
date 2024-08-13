<?php
$disciplina = $_POST['disciplina'];
$turma = $_POST['turma'];

$caminho = "Notas/{$disciplina}_{$turma}.txt";
$info = "<tr>";
$dados = array();
if (file_exists($caminho)) {
    $arquivo = fopen($caminho, 'r');
    $tabela = "<table>
                    <thead>
                        <tr>
                            <th></th>
                            <th>N° Matrícula</th>
                            <th></th>
                            <th>Nota 1</th>
                            <th></th>
                            <th>Nota 2</th>
                            <th></th>
                            <th>Nota 3</th>
                            <th></th>
                            <th>Média</th>
                            <th></th>
                            <th>Aprovação</th>
                        </tr>
                    </thead>
                    <tbody>";
    while (!feof($arquivo)) {
        $valor = fgets($arquivo, 4096);
        if (strlen($valor) > 20) {
            array_push($dados, $valor);
        }
    }
    $infos = array_chunk($dados, 6);
    for ($i = 0; $i < count($infos); $i++) {
        $coluna = "<tr>
                <td>{$infos[$i][0]}</td>
                <td>{$infos[$i][1]}</td>
                <td>{$infos[$i][2]}</td>
                <td>{$infos[$i][3]}</td>
                <td>{$infos[$i][4]}</td>
                <td>{$infos[$i][5]}</td>
            </tr>";
        $tabela = $tabela.$coluna;
    }
    fclose($arquivo);
    echo $tabela.'</tbody></table><br>
    <a href="tabela.html">Exibição de notas</a>
    ';
} else {
    echo '
    <p>Arquivo não encontrado, volte para a página de exibição de notas!</p><br>
    <a href="tabela.html">Exibição de notas</a>
    ';
}
?>