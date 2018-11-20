<?php

namespace App\Repository;

use Doctrine\ORM\EntityRepository;

class FornecedorRepository extends EntityRepository
{
    public function quantidadeFornecedores(array $parametros)
    {
        $primeiroResultado =($parametros['pagina'] - 1) * $parametros['limite'];

        $qb = $this->createQueryBuilder('f');

        $qb ->select('COUNT(f.id)');

        if (!empty($parametros['pesquisa'])) {
            $qb->andWhere($qb->expr()->orX(
                $qb->expr()->like('f.nome', ':pesquisa')
            ))->setParameter('pesquisa', '%' . $parametros['pesquisa'] . '%');
        }

        if (!empty($parametros['cnpj'])) {
            $qb->andWhere('f.cnpj = :cnpj')
            ->setParameter('cnpj', $parametros['cnpj']);
        }

        return $qb->getQuery()->getSingleScalarResult();
    }

    public function listarTodosFornecedores(array $parametros)
    {
        $primeiroResultado =($parametros['pagina'] - 1) * $parametros['limite'];

        $qb = $this->createQueryBuilder('f');

        $qb ->select('
                f.id,
                f.nome,
                f.cnpj
        ')
        ->setFirstResult($primeiroResultado)
        ->setMaxResults($parametros['limite']);

        if (!empty($parametros['pesquisa'])) {
            $qb->andWhere($qb->expr()->orX(
                $qb->expr()->like('f.nome', ':pesquisa')
            ))->setParameter('pesquisa', '%' . $parametros['pesquisa'] . '%');
        }

        if (!empty($parametros['cnpj'])) {
            $qb->andWhere('f.cnpj = :cnpj')
            ->setParameter('cnpj', $parametros['cnpj']);
        }

        $qb->orderBy($parametros['ordernacao'], $parametros['direcao']);

        return $qb->getQuery()->getArrayResult();
    }
}
