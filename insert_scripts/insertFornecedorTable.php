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

foreach ($xml->DESPESAS->DESPESA as $fornecedor) {
    $lidos ++;

    $consultaFornecedor = $pdo->prepare("SELECT id FROM fornecedor where cnpj = :cnpj and cnpj <> ''");
    $consultaFornecedor->bindParam(':cnpj', $fornecedor->txtCNPJCPF);
    $consultaFornecedor->execute();
    $fornecedorId = $consultaFornecedor->fetch();

    if (empty($fornecedor->txtCNPJCPF)) {
        $consultaFornecedorNome = $pdo->prepare("SELECT id FROM fornecedor where nome = :nome and cnpj = ''");
        $consultaFornecedorNome->bindParam(':nome', $fornecedor->txtFornecedor);
        $consultaFornecedorNome->execute();
        $fornecedorId = $consultaFornecedorNome->fetch();
    }

    if (!empty($fornecedorId['id'])) {
        echo ("lidos = $lidos\ninseridos = $inseridos \n");
        continue;
    }

    $inserirFornecedor = $pdo->prepare('INSERT INTO fornecedor (nome, cnpj) VALUES(:nome, :cnpj)');
    $inserirFornecedor->execute([
        ':nome' => $fornecedor->txtFornecedor,
        ':cnpj' => $fornecedor->txtCNPJCPF
    ]);

    $inseridos ++;

    echo ("lidos = $lidos\ninseridos = $inseridos \n"); 
}

echo("Acabou");