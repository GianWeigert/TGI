<?php

namespace App\Repository;

use Doctrine\ORM\EntityRepository;

class PartidoRepository extends EntityRepository
{
    public function listarTodosPartidos($pesquisa)
    {
        $qb = $this->createQueryBuilder('p');

        $qb ->select('
                p.nome,
                p.sigla,
                p.image
        ');

        if (!empty($pesquisa)) {
            $qb->andWhere($qb->expr()->orX(
                $qb->expr()->like('p.nome', ':pesquisa')
            ))->setParameter('pesquisa', '%' . $pesquisa . '%');
        }

        $qb->orderBy('p.sigla', 'asc');

        return $qb->getQuery()->getArrayResult();
    }
}
