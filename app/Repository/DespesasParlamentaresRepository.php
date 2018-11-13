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
            ->setParameters([
                'initDate' => $initDate,
                'finalDate'  => $finalDate
            ])
            ->getQuery()
            ->getSingleScalarResult();

        return $qb;
    }
}
