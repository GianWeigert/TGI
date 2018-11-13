<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\TipoDocumentoRepository")
 * @ORM\Table(name="tipo_documento") 
 */ 
class TipoDocumento
{
    const NOTA_FISCAL = 'Nota fiscal';
    const RECIBO = 'Recibo';
    const DESPESA_EXTERIOR = 'Despesa no exterior';
    const DOCUMENTO_NAO_ESPECIFICADO = 'Tipo documento não especificado';

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
     * @ORM\Column(name="numero_documento", type="integer", nullable=false)
     */
    private $numeroDocumento;

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

    public function getNumeroDocumento()
    {
        return $this->numeroDocumento;
    }

    public function setNumeroDocumento($numeroDocumento)
    {
        $this->numeroDocumento = $numeroDocumento;
    }
}
