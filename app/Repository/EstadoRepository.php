<?php

namespace App\Repository;

use Doctrine\ORM\EntityRepository;

class EstadoRepository extends EntityRepository
{
    public function quantidadeEstados(array $parametros)
    {
        $qb = $this->createQueryBuilder('e');

        $qb ->select('COUNT(e.id)');

        if (!empty($parametros['pesquisa'])) {
            $qb->andWhere($qb->expr()->orX(
                $qb->expr()->like('e.nome', ':pesquisa')
            ))->setParameter('pesquisa', '%' . $parametros['pesquisa'] . '%');
        }

        return $qb->getQuery()->getSingleScalarResult();
    }

    public function listarTodosEstados(array $parametros)
    {
        $primeiroResultado =($parametros['pagina'] - 1) * $parametros['limite'];

        $qb = $this->createQueryBuilder('e');

        $qb ->select('
                e.nome,
                e.uf,
                e.image
        ')
        ->setFirstResult($primeiroResultado)
        ->setMaxResults($parametros['limite']);

        if (!empty($parametros['pesquisa'])) {
            $qb->andWhere($qb->expr()->orX(
                $qb->expr()->like('e.nome', ':pesquisa')
            ))->setParameter('pesquisa', '%' . $parametros['pesquisa'] . '%');
        }

        $qb->orderBy($parametros['ordenacao'], $parametros['direcao']);

        return $qb->getQuery()->getArrayResult();
    }
}
