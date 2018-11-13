<?php

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

foreach ($xml->DESPESAS->DESPESA  as $despesasParlamentares) {
    $lidos ++;

    $consultaParlamentar = $pdo->prepare("SELECT id FROM parlamentar where numero_cadastro = :numero_cadastro and numero_cadastro <> 0;");
    $consultaParlamentar->bindParam(':numero_cadastro', $despesasParlamentares->idecadastro);
    $consultaParlamentar->execute();
    $parlamentarId = $consultaParlamentar->fetch();

    if (empty($parlamentarId['id'])) {
        $consultaNome = $pdo->prepare("SELECT id FROM parlamentar where nome = :nome;");
        $consultaNome->bindParam(':nome', $despesasParlamentares->txNomeParlamentar);
        $consultaNome->execute();
        $parlamentarId = $consultaNome->fetch();
    }

    $consultaFornecedor = $pdo->prepare("SELECT id FROM fornecedor where cnpj = :cnpj and cnpj <> ''");
    $consultaFornecedor->bindParam(':cnpj', $despesasParlamentares->txtCNPJCPF);
    $consultaFornecedor->execute();
    $fornecedorId = $consultaFornecedor->fetch();

    if (empty($fornecedorId['id'])) {
        $consultaFornecedorNome = $pdo->prepare("SELECT id FROM fornecedor where nome = :nome and cnpj = ''");
        $consultaFornecedorNome->bindParam(':nome', $despesasParlamentares->txtFornecedor);
        $consultaFornecedorNome->execute();
        $fornecedorId = $consultaFornecedorNome->fetch();
    }

    $consultaDespesa = $pdo->prepare("SELECT id FROM despesa where descricao = :descricao and descricao <> ''");
    $consultaDespesa->bindParam(':descricao', $despesasParlamentares->txtDescricao);
    $consultaDespesa->execute();
    $despesaId = $consultaDespesa->fetch();

    $consultaTipoDocumento = $pdo->prepare("SELECT id FROM tipo_documento where numero_documento = :numero_documento");
    $consultaTipoDocumento->bindParam(':numero_documento', $despesasParlamentares->indTipoDocumento);
    $consultaTipoDocumento->execute();
    $documentoId = $consultaTipoDocumento->fetch();

    if (empty($documentoId['id'])) {
        $documentoId['id'] = 4;
    }

    $valorDocumento = (float) str_replace(",", ".", $despesasParlamentares->vlrDocumento);
    $valorGlosa = (float) str_replace(",", ".", $despesasParlamentares->vlrGlosa);
    $valorLiquido = (float) str_replace(",", ".", $despesasParlamentares->vlrLiquido);
    $valorRestituicao = (float) str_replace(",", ".", $despesasParlamentares->vlrRestituicao);

    $data = $despesasParlamentares->datEmissao;

    if (empty($despesasParlamentares->datEmissao)) {
        $data = $despesasParlamentares->numAno .'-' . $despesasParlamentares->numMes . '-01 00:00:00';
    }

    $inserirFornecedor = $pdo->prepare('INSERT INTO despesas_parlamentares (especificacao_despesa, numero_nota,  data_emissao, valor_documento, valor_glosa, valor_liquido, valor_restituicao, documento_id, parlamentar_id, despesa_id, fornecedor_id) VALUES(:especificacao_despesa, :numero_nota, :data_emissao, :valor_documento, :valor_glosa, :valor_liquido, :valor_restituicao, :documento_id, :parlamentar_id, :despesa_id, :fornecedor_id)');
    $inserirFornecedor->execute([
        ':especificacao_despesa' => $despesasParlamentares->txtDescricaoEspecificacao,
        ':numero_nota' => $despesasParlamentares->txtNumero,
        ':data_emissao' => $data,
        ':valor_documento' => $valorDocumento,
        ':valor_glosa' => $valorGlosa,
        ':valor_liquido' => $valorLiquido,
        ':valor_restituicao' => $valorRestituicao,
        ':documento_id' => $documentoId['id'],
        ':parlamentar_id' => $parlamentarId['id'],
        ':despesa_id' => $despesaId['id'],
        ':fornecedor_id' => $fornecedorId['id']
    ]);

    $inseridos ++;

    echo ("lidos = $lidos\ninseridos = $inseridos \n"); 
}

echo("Acabou");