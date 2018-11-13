<?php

ini_set('default_charset','UTF-8');

$pdo = new PDO('mysql:host=127.0.0.1;dbname=gastos_parlamentares_db;charset=utf8', 'root', 'root');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// $xml = simplexml_load_file(__DIR__ . '/../Dados/Ano-2009.xml');
// $xml = simplexml_load_file(__DIR__ . '/../Dados/Ano-2010.xml');
// $xml = simplexml_load_file(__DIR__ . '/../Dados/Ano-2011.xml');
// $xml = simplexml_load_file(__DIR__ . '/../Dados/Ano-2012.xml');
// $xml = simplexml_load_file(__DIR__ . '/../Dados/Ano-2013.xml');
// $xml = simplexml_load_file(__DIR__ . '/../Dados/Ano-2014.xml');
// $xml = simplexml_load_file(__DIR__ . '/../Dados/Ano-2015.xml');
// $xml = simplexml_load_file(__DIR__ . '/../Dados/Ano-2016.xml');
$xml = simplexml_load_file(__DIR__ . '/../../Dados/Ano-2017.xml');

$lidos = 0;
$inseridos =0;

foreach ($xml->DESPESAS->DESPESA as $despesa) {
    $lidos ++;

    $consultaDespesa = $pdo->prepare("SELECT id FROM despesa where descricao = :descricao and descricao <> ''");
    $consultaDespesa->bindParam(':descricao', $despesa->txtDescricao);
    $consultaDespesa->execute();
    $despesaId = $consultaDespesa->fetch();

    if (!empty($despesaId['id'])) {
        echo ("lidos = $lidos \ninseridos = $inseridos \n");
        continue;
    }

    $inserirDespesa = $pdo->prepare('INSERT INTO despesa (descricao, numero_sub_cota) VALUES(:descricao, :numero_sub_cota)');
    $inserirDespesa->execute([
        ':descricao' => $despesa->txtDescricao,
        ':numero_sub_cota' => $despesa->numSubCota
    ]);

    $inseridos ++;

    echo ("lidos = $lidos \ninseridos = $inseridos \n"); 
}

echo("Acabou");