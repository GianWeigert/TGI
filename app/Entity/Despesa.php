<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\DespesaRepository")
 * @ORM\Table(name="despesa") 
 */ 
class Despesa
{
    /**
     * @ORM\Id
     * @ORM\Column(name="id", type="integer")
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @ORM\Column(name="descricao", type="string", length=255, nullable=false)
     */
    private $descricao;

    /**
     * @ORM\Column(name="numero_sub_cota", type="integer", nullable=false)
     */
    private $numeroSubCota;

    public function getId()
    {
        return $this->id;
    }

    public function getDescricao()
    {
        return $this->descricao;
    }

    public function setDescricao($descricao)
    {
        $this->descricao = $descricao;
    }

    public function getNumeroSubCota()
    {
        return $this->numeroSubCota;
    }

    public function setNumeroSubCota($numeroSubCota)
    {
        $this->numeroSubCota = $numeroSubCota;
    }
}
