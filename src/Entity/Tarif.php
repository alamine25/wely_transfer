<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass="App\Repository\TarifRepository")
 */
class Tarif
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="float")
     */
    private $bornInf;

    /**
     * @ORM\Column(type="float")
     */
    private $bornSup;

    /**
     * @ORM\Column(type="float")
     */
    private $frais;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getBornInf(): ?float
    {
        return $this->bornInf;
    }

    public function setBornInf(float $bornInf): self
    {
        $this->bornInf = $bornInf;

        return $this;
    }

    public function getBornSup(): ?float
    {
        return $this->bornSup;
    }

    public function setBornSup(float $bornSup): self
    {
        $this->bornSup = $bornSup;

        return $this;
    }

    public function getFrais(): ?float
    {
        return $this->frais;
    }

    public function setFrais(float $frais): self
    {
        $this->frais = $frais;

        return $this;
    }
}
