<?php

namespace App\Entity;

use App\Entity\Despesa;
use App\Entity\Fornecedor;
use App\Entity\Parlamentar;
use App\Entity\TipoDocumento;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\DespesasParlamentaresRepository")
 * @ORM\Table(name="despesas_parlamentares") 
 */ 
class DespesasParlamentares
{
    /**
     * @ORM\Id
     * @ORM\Column(name="id", type="integer")
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @ORM\Column(name="especificacao_despesa", type="string", length=255)
     */
    private $especificacaoDespesa;

    /**
     * @ORM\Column(name="numero_nota", type="string", length=255, nullable=false)
     */
    private $numeroNota;

    /**
     * @ORM\Column(name="data_emissao", type="datetime", nullable=false)
     */
    private $dataEmissao;

    /**
     * @Column(name="valor_documento", type="decimal", precision=9, scale=2)
     */
    private $valorDocumento;

    /**
     * @Column(name="valor_glosa", type="decimal", precision=9, scale=2)
     */
    private $valorGlosa;
    
    /**
     * @Column(name="valor_liquido", type="decimal", precision=9, scale=2)
     */
    private $valorLiquido;

    /**
     * @Column(name="valor_restituicao", type="decimal", precision=9, scale=2)
     */
    private $valorRestituicao;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Parlamentar")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="parlamentar_id", referencedColumnName="id")
     * })
     */
    private $parlamentar;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Despesa")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="despesa_id", referencedColumnName="id")
     * })
     */
    private $despesa;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Fornecedor")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="fornecedor_id", referencedColumnName="id")
     * })
     */
    private $fornecedor;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\TipoDocumento")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="documento_id", referencedColumnName="id")
     * })
     */
    private $tipoDocumento;

    public function __construct()
    {
        $this->dataEmissao = new \DateTime();
        $this->Parlamentar = null;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getEspecificacaoDespesa()
    {
        return $this->especificacaoDespesa;
    }

    public function setEspecificacaoDespesa($especificacaoDespesa)
    {
        $this->especificacaoDespesa = $especificacaoDespesa;
    }

    public function getNumeroNota()
    {
        return $this->numeroNota;
    }

    public function setNumeroNota($numeroNota)
    {
        $this->numeroNota = $numeroNota;
    }

    public function getDataEmissao()
    {
        return $this->dataEmissao;
    }

    public function setDataEmissao(\DateTime $dataEmissao)
    {
        $this->dataEmissao = $dataEmissao;
    }

    public function getValorDocumento()
    {
        return $this->valorDocumento;
    }

    public function setValorDocumento($valorDocumento)
    {
        $this->valorDocumento = $valorDocumento; 
    }

    public function getValorGlosa()
    {
        return $this->valorGlosa;
    }

    public function setValorGlosa($valorGlosa)
    {
        $this->valorGlosa = $valorGlosa;
    }

    public function getValorLiquido()
    {
        return $this->valorLiquido;
    }

    public function setValorLiquido($valorLiquido)
    {
        $this->valorLiquido = $valorLiquido
    }

    public function getValorRestituicao()
    {
        return $this->valorRestituicao;
    }

    public function setValorRestituicao($valorRestituicao)
    {
        $this->valorRestituicao = $valorRestituicao;
    }

    public function getParlamentar()
    {
        return $this->parlamentar;
    } 

    public function setParlamentar(Parlamentar $parlamentar)
    {
        $this->parlamentar = $parlamentar;
    }

    public function getDespesa()
    {
        return $this->despesa;
    } 

    public function setDespesa(Despesa $despesa)
    {
        $this->despesa = $despesa;
    }

    public function getFornecedor()
    {
        return $this->fornecedor;
    } 

    public function setFornecedor(Fornecedor $fornecedor)
    {
        $this->fornecedor = $fornecedor;
    }

    public function getTipoDocumento()
    {
        return $this->tipoDocumento;
    } 

    public function setTipoDocumento(TipoDocumento $tipoDocumento)
    {
        $this->tipoDocumento = $tipoDocumento;
    }
}
