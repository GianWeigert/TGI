<?php

namespace App\Repository;

use Doctrine\ORM\EntityRepository;

class ParlamentarRepository extends EntityRepository
{
    public function totalDeParlamentares(array $parametros)
    {
        $qb = $this->createQueryBuilder('pa');
        $qb->select('COUNT(pa.id)')
           ->innerJoin('pa.partido', 'p')
           ->innerJoin('pa.estado', 'e');

        if (!empty($parametros['pesquisa'])) {
            $qb->andWhere($qb->expr()->orX(
                $qb->expr()->like('pa.nome', ':pesquisa')
            ))->setParameter('pesquisa', '%' . $parametros['pesquisa'] . '%');
        }

        if (!empty($parametros['partido'])) {
            $qb->andWhere('p.sigla = :partido');
            $qb->setParameter('partido', $parametros['partido']);
        }

        if (!empty($parametros['estado'])) {
            $qb->andWhere('e.nome = :estado');
            $qb->setParameter('estado', $parametros['estado']);
        }

        return $qb->getQuery()->getSingleScalarResult();
    }

    public function listarTodosParlamentares(array $parametros)
    {
        $primeiroResultado = ($parametros['pagina'] - 1) * $parametros['limite'];

        $qb = $this->createQueryBuilder('pa');

        $qb->select('
            pa.id,
            pa.nome,
            p.sigla as partido,
            e.uf as estado
        ')
        ->innerJoin('pa.partido', 'p')
        ->innerJoin('pa.estado', 'e')
        ->setFirstResult($primeiroResultado)
        ->setMaxResults($parametros['limite']);

        if (!empty($parametros['pesquisa'])) {
            $qb->andWhere($qb->expr()->orX(
                $qb->expr()->like('pa.nome', ':pesquisa')
            ))->setParameter('pesquisa', '%' . $parametros['pesquisa'] . '%');
        }

        if (!empty($parametros['partido'])) {
            $qb->andWhere('p.sigla = :partido');
            $qb->setParameter('partido', $parametros['partido']);
        }

        if (!empty($parametros['estado'])) {
            $qb->andWhere('e.nome = :estado');
            $qb->setParameter('estado', $parametros['estado']);
        }

        $qb->orderBy($parametros['ordernacao'], $parametros['direcao']);

        return $qb->getQuery()->getArrayResult();
    }

    public function procurarParlamentar($id)
    {
        $qb = $this->createQueryBuilder('pa');

        $qb->select('
            pa.id,
            pa.nome,
            pa.numeroCadastro,
            p.sigla as partido,
            e.nome as estado
        ')
        ->innerJoin('pa.partido', 'p')
        ->innerJoin('pa.estado', 'e')
        ->where('pa.id = :id')
        ->setParameter('id', $id);

        return $qb->getQuery()->getSingleResult();
    }

    public function estadosMaisParalmentaresPartido($sigla)
    {
        $qb = $this->createQueryBuilder('pa');

        $qb->select('
            e.nome as estado,
            count(pa.id) as quantidadeParlamentares
        ')
        ->innerJoin('pa.partido', 'p')
        ->innerJoin('pa.estado', 'e')
        ->andWhere('p.sigla = :sigla')
        ->setParameter('sigla', $sigla)
        ->orderBy('quantidadeParlamentares', 'desc')
        ->groupBy('e.nome');

        return $qb->getQuery()->getArrayResult();
    }
}
