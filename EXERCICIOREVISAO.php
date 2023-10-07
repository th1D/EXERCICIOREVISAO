<?php
$vetorA = ["ADS", "CD", "ADS", "ADS", "CD", "CD", "ADS"];
$indices = ["Nome", "Idade", "Curso", "Media"];
$valores = ["Pedro", 30, "ADS", 7.0];

$dados = [
    ["Nome" => "Maria", "Curso" => "ADS", "Media" => 7.0],
    ["Nome" => "Joao", "Curso" => "CD", "Media" => 5],
    ["Nome" => "Jose", "Curso" => "CD", "Media" => 8.0],
    ["Nome" => "Pedro", "Curso" => "ADS", "Media" => 1.5],
    ["Nome" => "Paulo", "Curso" => "ADS", "Media" => 6.0]
];

foreach ($dados as &$aluno) {
    $media = $aluno["Media"];
    if ($media < 2) {
        $aluno["Situacao"] = "Reprovado";
    } elseif ($media >= 2 && $media < 6) {
        $aluno["Situacao"] = "Exame Final";
    } else {
        $aluno["Situacao"] = "Aprovado";
    }
}
unset($aluno); 

echo '<table border="1">';
echo '<tr>';
foreach ($indices as $indice) {
    echo "<th>$indice</th>";
}
echo '</tr>';
foreach ($dados as $aluno) {
    echo '<tr>';
    foreach ($aluno as $valor) {
        echo "<td>$valor</td>";
    }
    echo '</tr>';
}
echo '</table>';


$situacoes_por_curso = [];

foreach ($dados as $aluno) {
    $curso = $aluno["Curso"];
    $situacao = $aluno["Situacao"];

    if (!isset($situacoes_por_curso[$curso])) {
        $situacoes_por_curso[$curso] = [
            "Aprovado" => 0,
            "Exame Final" => 0,
            "Reprovado" => 0
        ];
    }

    $situacoes_por_curso[$curso][$situacao]++;
}

echo '<br>';
foreach ($situacoes_por_curso as $curso => $situacoes) {
    echo "$curso:<br>";
    echo "- Aprovado: {$situacoes['Aprovado']}<br>";
    echo "- Exame Final: {$situacoes['Exame Final']}<br>";
    echo "- Reprovado: {$situacoes['Reprovado']}<br>";
}
?>
