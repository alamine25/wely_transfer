<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass="App\Repository\TransactionRepository")
 */
class Transaction
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="transactions")
     * @ORM\JoinColumn(nullable=false)
     */
    private $userDepot;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="transactions")
     */
    private $userRetrait;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Compte", inversedBy="transactions")
     * @ORM\JoinColumn(nullable=false)
     */
    private $compteDepot;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Compte", inversedBy="transactions")
     */
    private $compteRetrait;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $prenomExp;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nomExp;

    /**
     * @ORM\Column(type="integer")
     */
    private $telephoneExp;

    /**
     * @ORM\Column(type="integer")
     */
    private $numpieceExp;

    /**
     * @ORM\Column(type="datetime")
     */
    private $dateEnvoi;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $prenomRecep;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nomRecep;

    /**
     * @ORM\Column(type="integer")
     */
    private $telephoneRecep;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $numpieceRecep;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $dateRetrait;

    /**
     * @ORM\Column(type="float")
     */
    private $montant;

    /**
     * @ORM\Column(type="float")
     */
    private $frais;

    /**
     * @ORM\Column(type="integer")
     */
    private $code;

    /**
     * @ORM\Column(type="float")
     */
    private $commissionEtat;

    /**
     * @ORM\Column(type="float")
     */
    private $commissionSys;

    /**
     * @ORM\Column(type="float")
     */
    private $commissionEnvoi;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $commissionRetrait;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUserDepot(): ?User
    {
        return $this->userDepot;
    }

    public function setUserDepot(?User $userDepot): self
    {
        $this->userDepot = $userDepot;

        return $this;
    }

    public function getUserRetrait(): ?User
    {
        return $this->userRetrait;
    }

    public function setUserRetrait(?User $userRetrait): self
    {
        $this->userRetrait = $userRetrait;

        return $this;
    }

    public function getCompteDepot(): ?Compte
    {
        return $this->compteDepot;
    }

    public function setCompteDepot(?Compte $compteDepot): self
    {
        $this->compteDepot = $compteDepot;

        return $this;
    }

    public function getCompteRetrait(): ?Compte
    {
        return $this->compteRetrait;
    }

    public function setCompteRetrait(?Compte $compteRetrait): self
    {
        $this->compteRetrait = $compteRetrait;

        return $this;
    }

    public function getPrenomExp(): ?string
    {
        return $this->prenomExp;
    }

    public function setPrenomExp(string $prenomExp): self
    {
        $this->prenomExp = $prenomExp;

        return $this;
    }

    public function getNomExp(): ?string
    {
        return $this->nomExp;
    }

    public function setNomExp(string $nomExp): self
    {
        $this->nomExp = $nomExp;

        return $this;
    }

    public function getTelephoneExp(): ?int
    {
        return $this->telephoneExp;
    }

    public function setTelephoneExp(int $telephoneExp): self
    {
        $this->telephoneExp = $telephoneExp;

        return $this;
    }

    public function getNumpieceExp(): ?int
    {
        return $this->numpieceExp;
    }

    public function setNumpieceExp(int $numpieceExp): self
    {
        $this->numpieceExp = $numpieceExp;

        return $this;
    }

    public function getDateEnvoi(): ?\DateTimeInterface
    {
        return $this->dateEnvoi;
    }

    public function setDateEnvoi(\DateTimeInterface $dateEnvoi): self
    {
        $this->dateEnvoi = $dateEnvoi;

        return $this;
    }

    public function getPrenomRecep(): ?string
    {
        return $this->prenomRecep;
    }

    public function setPrenomRecep(string $prenomRecep): self
    {
        $this->prenomRecep = $prenomRecep;

        return $this;
    }

    public function getNomRecep(): ?string
    {
        return $this->nomRecep;
    }

    public function setNomRecep(string $nomRecep): self
    {
        $this->nomRecep = $nomRecep;

        return $this;
    }

    public function getTelephoneRecep(): ?int
    {
        return $this->telephoneRecep;
    }

    public function setTelephoneRecep(int $telephoneRecep): self
    {
        $this->telephoneRecep = $telephoneRecep;

        return $this;
    }

    public function getNumpieceRecep(): ?int
    {
        return $this->numpieceRecep;
    }

    public function setNumpieceRecep(?int $numpieceRecep): self
    {
        $this->numpieceRecep = $numpieceRecep;

        return $this;
    }

    public function getDateRetrait(): ?\DateTimeInterface
    {
        return $this->dateRetrait;
    }

    public function setDateRetrait(?\DateTimeInterface $dateRetrait): self
    {
        $this->dateRetrait = $dateRetrait;

        return $this;
    }

    public function getMontant(): ?float
    {
        return $this->montant;
    }

    public function setMontant(float $montant): self
    {
        $this->montant = $montant;

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

    public function getCode(): ?int
    {
        return $this->code;
    }

    public function setCode(int $code): self
    {
        $this->code = $code;

        return $this;
    }

    public function getCommissionEtat(): ?float
    {
        return $this->commissionEtat;
    }

    public function setCommissionEtat(float $commissionEtat): self
    {
        $this->commissionEtat = $commissionEtat;

        return $this;
    }

    public function getCommissionSys(): ?float
    {
        return $this->commissionSys;
    }

    public function setCommissionSys(float $commissionSys): self
    {
        $this->commissionSys = $commissionSys;

        return $this;
    }

    public function getCommissionEnvoi(): ?float
    {
        return $this->commissionEnvoi;
    }

    public function setCommissionEnvoi(float $commissionEnvoi): self
    {
        $this->commissionEnvoi = $commissionEnvoi;

        return $this;
    }

    public function getCommissionRetrait(): ?float
    {
        return $this->commissionRetrait;
    }

    public function setCommissionRetrait(?float $commissionRetrait): self
    {
        $this->commissionRetrait = $commissionRetrait;

        return $this;
    }
}
