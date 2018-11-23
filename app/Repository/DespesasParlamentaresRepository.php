<?php

namespace App\Repository;

use Doctrine\ORM\EntityRepository;

class DespesasParlamentaresRepository extends EntityRepository
{
    public function procurarValorDespesaPorData(
        \Datetime $dataInicial,
        \Datetime $dataFinal,
        array $parametros
    ) {
        $qb = $this->createQueryBuilder('dp');

        $qb->select('SUM(dp.valorLiquido)')
            ->innerJoin('dp.parlamentar', 'pa')
            ->where('dp.dataEmissao BETWEEN :dataInicial AND :dataFinal')
            ->andWhere('dp.valorLiquido > 0')
            ->setParameters([
                'dataInicial' => $dataInicial,
                'dataFinal'  => $dataFinal
            ]);

        if (!empty($parametros['parlamentarId'])) {
            $qb->andWhere('pa.id = :parlamentarId');
            $qb->setParameter('parlamentarId', $parametros['parlamentarId']);
        }

        return $qb->getQuery()->getSingleScalarResult();
    }

    public function listarMaiorDespesaParlamentar($parlamentarId)
    {
        $qb = $this->createQueryBuilder('dp');

        $qb->select('
            dp.valorLiquido,
            dp.dataEmissao,
            d.descricao AS despesa,
            f.nome AS fornecedor
        ')
        ->innerJoin('dp.despesa', 'd')
        ->innerJoin('dp.fornecedor', 'f')
        ->innerJoin('dp.parlamentar', 'pa')
        ->where('pa.id = :parlamentarId')
        ->setParameters([
            'parlamentarId' => $parlamentarId
        ])
        ->setMaxResults(1)
        ->orderBy('dp.valorLiquido', 'desc');

        return $qb->getQuery()->getSingleResult();
    }

    public function listarTodasDespesas($parametros)
    {
        $primeiroResultado =($parametros['pagina'] - 1) * $parametros['limite'];

        $qb = $this->createQueryBuilder('dp');

        $qb->select('
            dp.valorLiquido,
            dp.dataEmissao,
            d.descricao,
            f.nome AS fornecedor,
            tp.descricao as tipoDocumento
        ')
        ->innerJoin('dp.despesa', 'd')
        ->innerJoin('dp.fornecedor', 'f')
        ->innerJoin('dp.parlamentar', 'pa')
        ->innerJoin('dp.tipoDocumento', 'tp')
        ->where('dp.valorLiquido > 0')
        ->setFirstResult($primeiroResultado)
        ->setMaxResults($parametros['limite']);

        if (!empty($parametros['parlamentarId'])) {
            $qb->andWhere('pa.id = :parlamentarId');
            $qb->setParameter('parlamentarId', $parametros['parlamentarId']);
        }

        if (!empty($parametros['ano'])) {
            $dataInicial = $parametros['ano'] . '-01-01';
            $dataInicial = new \Datetime($dataInicial);

            $dataFinal = $parametros['ano'] . '-12-31';
            $dataFinal = new \Datetime($dataFinal);

            $qb->andWhere('dp.dataEmissao BETWEEN :dataInicial AND :dataFinal')
               ->setParameter('dataInicial', $dataInicial->format('Y-m-d'))
               ->setParameter('dataFinal', $dataFinal->format('Y-m-d'));
        }

        $qb->orderBy($parametros['ordenacao'], $parametros['direcao']);

        return $qb->getQuery()->getArrayResult();
    }

    public function quantidadeDespesas($parametros)
    {
        $qb = $this->createQueryBuilder('dp');

        $qb->select('COUNT(dp.id)')
        ->where('dp.valorLiquido > 0')
        ->innerJoin('dp.parlamentar', 'pa');

        if (!empty($parametros['parlamentarId'])) {
            $qb->andWhere('pa.id = :parlamentarId');
            $qb->setParameter('parlamentarId', $parametros['parlamentarId']);
        }

        $qb->orderBy($parametros['ordenacao'], $parametros['direcao']);

        return $qb->getQuery()->getSingleScalarResult();
    }

    public function obterGastosPorDespesa(array $parametros)
    {
        $qb = $this->createQueryBuilder('dp');

        $qb->select('
                d.id,
                d.descricao,
                SUM(dp.valorLiquido) as valorLiquido
            ')
            ->innerJoin('dp.parlamentar', 'pa')
            ->innerJoin('dp.despesa', 'd')
            ->where('dp.valorLiquido > 0');

        if (!empty($parametros['parlamentarId'])) {
            $qb->andWhere('pa.id = :parlamentarId');
            $qb->setParameter('parlamentarId', $parametros['parlamentarId']);
        }

        if (!empty($parametros['ano'])) {
            $dataInicial = $parametros['ano'] . '-01-01';
            $dataInicial = new \Datetime($dataInicial);

            $dataFinal = $parametros['ano'] . '-12-31';
            $dataFinal = new \Datetime($dataFinal);

            $qb->andWhere('dp.dataEmissao BETWEEN :dataInicial AND :dataFinal')
               ->setParameter('dataInicial', $dataInicial->format('Y-m-d'))
               ->setParameter('dataFinal', $dataFinal->format('Y-m-d'));
        }

        $qb->groupBy('d.id');

        return $qb->getQuery()->getArrayResult();
    }

    public function obterFornecedoresMaiorGasto(array $parametros)
    {
        $qb = $this->createQueryBuilder('dp');

        $qb->select('
                f.id,
                f.nome,
                COUNT(dp.id) as vezesGasta,
                SUM(dp.valorLiquido) as totalGasto
            ')
            ->innerJoin('dp.fornecedor', 'f')
            ->innerJoin('dp.parlamentar', 'pa')
            ->where('dp.valorLiquido > 0');

        if (!empty($parametros['parlamentarId'])) {
            $qb->andWhere('pa.id = :parlamentarId');
            $qb->setParameter('parlamentarId', $parametros['parlamentarId']);
        }

        if (!empty($parametros['ano'])) {
            $dataInicial = $parametros['ano'] . '-01-01';
            $dataInicial = new \Datetime($dataInicial);

            $dataFinal = $parametros['ano'] . '-12-31';
            $dataFinal = new \Datetime($dataFinal);

            $qb->andWhere('dp.dataEmissao BETWEEN :dataInicial AND :dataFinal')
               ->setParameter('dataInicial', $dataInicial->format('Y-m-d'))
               ->setParameter('dataFinal', $dataFinal->format('Y-m-d'));
        }

        if (!empty($parametros['limite'])) {
            $qb->setMaxResults($parametros['limite']);
        }

        $qb->groupBy('f.id')
           ->orderBy('totalGasto', 'desc');

        return $qb->getQuery()->getArrayResult();
    }

    public function obterGastosDosParlamentares(array $parametros)
    {
        $primeiroResultado = ($parametros['pagina'] - 1) * $parametros['limite'];

        $qb = $this->createQueryBuilder('dp');

        $qb->select('
                pa.id as parlamentarId,
                pa.nome as parlamentarNome,
                e.nome as estado,
                COUNT(dp.id) as vezesGasta,
                SUM(dp.valorLiquido) as totalGasto
            ')
            ->innerJoin('dp.parlamentar', 'pa')
            ->innerJoin('pa.estado', 'e')
            ->innerJoin('pa.partido', 'p')
            ->where('dp.valorLiquido > 0')
            ->setFirstResult($primeiroResultado)
            ->setMaxResults($parametros['limite']);

        if (!empty($parametros['partido'])) {
            $qb->andWhere('p.sigla = :partido');
            $qb->setParameter('partido', $parametros['partido']);
        }

        if (!empty($parametros['estado'])) {
            $qb->andWhere('e.nome = :estado');
            $qb->setParameter('estado', $parametros['estado']);
        }

        $qb->groupBy('pa.id')
           ->orderBy($parametros['ordenacao'], $parametros['direcao']);

        return $qb->getQuery()->getArrayResult();
    }
}
