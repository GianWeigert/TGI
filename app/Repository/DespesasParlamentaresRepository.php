<?php

namespace App\Repository;

use Doctrine\ORM\EntityRepository;

class DespesasParlamentaresRepository extends EntityRepository
{
    public function procurarDespessasPorAno($ano)
    {
        $initDate = $ano . '-01-01 00:00:00';
        $initDate = new \DateTime($initDate);

        $finalDate = $ano . '-12-31 00:00:00';
        $finalDate = new \DateTime($finalDate);

        $qb = $this->createQueryBuilder('dp')
            ->select('SUM(dp.valorDocumento)')
            ->where('dp.dataEmissao BETWEEN :initDate AND :finalDate')
            ->andWhere('dp.valorLiquido > 0')
            ->setParameters([
                'initDate' => $initDate,
                'finalDate'  => $finalDate
            ])
            ->getQuery()
            ->getSingleScalarResult();

        return $qb;
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
            f.nome AS fornecedor
        ')
        ->innerJoin('dp.despesa', 'd')
        ->innerJoin('dp.fornecedor', 'f')
        ->innerJoin('dp.parlamentar', 'pa')
        ->where('dp.valorLiquido > 0')
        ->setFirstResult($primeiroResultado)
        ->setMaxResults($parametros['limite']);

        if (!empty($parametros['parlamentarId'])) {
            $qb->andWhere('pa.id = :parlamentarId');
            $qb->setParameter('parlamentarId', $parametros['parlamentarId']);
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
}
