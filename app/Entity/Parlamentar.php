<?php

namespace App\Entity;

use App\Entity\Estado;
use App\Entity\Partido;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ParlamentarRepository")
 * @ORM\Table(name="parlamentar") 
 */ 
class Estado
{
    /**
     * @ORM\Id
     * @ORM\Column(name="id", type="integer")
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @ORM\Column(name="nome", type="string", length=255, nullable=false)
     */
    private $nome;

    /**
     * @ORM\Column(name="numero_cadastro", type="integer", length=2, nullable=false)
     */
    private $numeroCadastro;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Partido", cascade={"all"})
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="partido_id", referencedColumnName="id")
     * })
     */
    private $partido;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Estado", cascade={"all"})
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="estado_id", referencedColumnName="id")
     * })
     */
    private $estado;

    public function getId()
    {
        return $this->id;
    }

    public function getNome()
    {
        return $this->nome;
    }

    public function setNome($nome)
    {
        $this->nome = $nome;
    }

    public function getNumeroCadastro()
    {
        return $this->numeroCadastro;
    }

    public function setUf($numeroCadastro)
    {
        $this->numeroCadastro = $numeroCadastro;
    }

    public function getPartido()
    {
        return $this->partido;
    }

    public function setPartido(Partido $partido)
    {
        $this->partido = $partido;
    }

    public function getEstado()
    {
        return $this->estado;
    }

    public function setEstado(Estado $estado)
    {
        $this->estado = $estado;
    }
}
