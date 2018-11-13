<?php

ini_set('default_charset','UTF-8');

$pdo = new PDO('mysql:host=127.0.0.1;dbname=gastos_parlamentares_db;charset=utf8', 'root', 'root');
// $pdo = new PDO('mysql:host=sql170.main-hosting.eu.;dbname=u232327569_tgi;charset=utf8', 'u232327569_tgi', 'sistema10');
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
$inseridos = 0;
$siglaSemPartido = 'PNIPT';
$siglaEstadoNaoDefinido = 'ND';

foreach ($xml->DESPESAS->DESPESA as $parlamentar) {
    $lidos ++;
    
    $consultaParlamentar = $pdo->prepare("SELECT id FROM parlamentar where numero_cadastro = :numero_cadastro;");
    $consultaParlamentar->bindParam(':numero_cadastro', $parlamentar->idecadastro);
    $consultaParlamentar->execute();
    $parlamentarId = $consultaParlamentar->fetch();

    if (!empty($parlamentarId['id'])) {
        $consultaNome = $pdo->prepare("SELECT id FROM parlamentar where nome = :nome;");
        $consultaNome->bindParam(':nome', $parlamentar->txNomeParlamentar);
        $consultaNome->execute();
        $parlamentarId = $consultaNome->fetch();

        if (!empty($parlamentarId['id'])) {
            echo ("lidos = $lidos\ninseridos = $inseridos \n");
            continue;
        }
    }

    $consultaPartido = $pdo->prepare("SELECT id FROM partido where sigla = :sigla;");
    $consultaPartido->bindParam(':sigla', $parlamentar->sgPartido);
    $consultaPartido->execute();
    $partidoId = $consultaPartido->fetch();

    if (empty($partidoId['id'])) {
        $consultaSemPartido = $pdo->prepare("SELECT id FROM partido where sigla = :sigla;");
        $consultaSemPartido->bindParam(':sigla', $siglaSemPartido);
        $consultaSemPartido->execute();
        $partidoId = $consultaSemPartido->fetch();
    }

    $consultaEstado = $pdo->prepare("SELECT id FROM estado where uf = :uf;");
    $consultaEstado->bindParam(':uf', $parlamentar->sgUF);
    $consultaEstado->execute();
    $estadoId = $consultaEstado->fetch();

    if (empty($estadoId['id'])) {
        $consultaSemEstado = $pdo->prepare("SELECT id FROM estado where uf = :uf;");
        $consultaSemEstado->bindParam(':uf', $siglaEstadoNaoDefinido);
        $consultaSemEstado->execute();
        $estadoId = $consultaSemEstado->fetch();
    }

    if (empty($parlamentar->idecadastro)) {
        $parlamentar->idecadastro = 0;
    }

    $inserirPartido = $pdo->prepare('INSERT INTO parlamentar (nome, numero_cadastro, partido_id, estado_id) VALUES(:nome, :numero_cadastro, :partido_id, :esatdo_id)');
    $inserirPartido->execute([
        ':nome' => $parlamentar->txNomeParlamentar,
        ':numero_cadastro' => $parlamentar->idecadastro,
        ':partido_id' => $partidoId['id'],
        ':esatdo_id' => $estadoId['id']
    ]);

    $inseridos ++;

    echo ("lidos = $lidos\ninseridos = $inseridos \n"); 
}

echo("Acabou");