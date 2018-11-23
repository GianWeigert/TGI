<?php

namespace App\Repository;

use Doctrine\ORM\EntityRepository;

class PartidoRepository extends EntityRepository
{
    public function quantidadePartidos($parametros)
    {
        $qb = $this->createQueryBuilder('p');

        $qb ->select('COUNT(p.id)');

        if (!empty($parametros['pesquisa'])) {
            $qb->andWhere($qb->expr()->orX(
                $qb->expr()->like('p.nome', ':pesquisa')
            ))->setParameter('pesquisa', '%' . $parametros['pesquisa'] . '%');
        }

        return $qb->getQuery()->getSingleScalarResult();
    }

    public function listarTodosPartidos($parametros)
    {
        $primeiroResultado =($parametros['pagina'] - 1) * $parametros['limite'];

        $qb = $this->createQueryBuilder('p');

        $qb ->select('
                p.id,
                p.nome,
                p.sigla,
                p.image
        ')
        ->setFirstResult($primeiroResultado)
        ->setMaxResults($parametros['limite']);

        if (!empty($parametros['pesquisa'])) {
            $qb->andWhere($qb->expr()->orX(
                $qb->expr()->like('p.nome', ':pesquisa')
            ))->setParameter('pesquisa', '%' . $parametros['pesquisa'] . '%');
        }

        $qb->orderBy($parametros['ordenacao'], $parametros['direcao']);

        return $qb->getQuery()->getArrayResult();
    }
}
