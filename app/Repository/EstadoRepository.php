<?php

namespace App\Repository;

use Doctrine\ORM\EntityRepository;

class EstadoRepository extends EntityRepository
{
    public function listarTodosEstados($pesquisa)
    {
        $qb = $this->createQueryBuilder('e');

        $qb ->select('
                e.nome,
                e.uf,
                e.image
        ');

        if (!empty($pesquisa)) {
            $qb->andWhere($qb->expr()->orX(
                $qb->expr()->like('e.nome', ':pesquisa')
            ))->setParameter('pesquisa', '%' . $pesquisa . '%');
        }

        $qb->orderBy('e.uf', 'asc');

        return $qb->getQuery()->getArrayResult();
    }
}
