<?php

namespace App\Repository;

use Doctrine\ORM\EntityRepository;

class PartidoRepository extends EntityRepository
{
    public function listarTodosPartidos()
    {
        $qb = $this->createQueryBuilder('p')
            ->select('
                p.nome,
                p.sigla,
                p.image
            ')
            ->orderBy('p.sigla', 'asc')
            ->getQuery()
            ->getArrayResult();

        return $qb;
    }
}
