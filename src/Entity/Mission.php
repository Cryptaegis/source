<?php

namespace App\Entity;

use App\Repository\MissionRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MissionRepository::class)]
class Mission
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;
    #[ORM\Column(length: 255)]
    /*@Assert\NotBlank*/
    private ?string $Nom = null;
    /*@Assert\NotBlank*/
    #[ORM\Column(length: 255)]
    private ?string $Alias = null;

    #[ORM\Column(length: 255)]
    private ?string $Statut = null;

    #[ORM\Column(length: 255)]
    private ?string $Description = null;

    #[ORM\Column(length: 255)]
    private ?string $Contact = null;

    #[ORM\Column(length: 255)]
    private ?string $Cible = null;

    #[ORM\Column(length: 255)]
    private ?string $Planque = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $DateDebut = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?int $DateFin = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->Nom;
    }

    public function setNom(string $Nom): static
    {
        $this->Nom = $Nom;

        return $this;
    }

    public function getAlias(): ?string
    {
        return $this->Alias;
    }

    public function setAlias(string $Alias): static
    {
        $this->Alias = $Alias;

        return $this;
    }

    public function getStatut(): ?string
    {
        return $this->Statut;
    }

    public function setStatut(string $Statut): static
    {
        $this->Statut = $Statut;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->Description;
    }

    public function setDescription(string $Description): static
    {
        $this->Description = $Description;

        return $this;
    }

    public function getContact(): ?string
    {
        return $this->Contact;
    }

    public function setContact(string $Contact): static
    {
        $this->Contact = $Contact;

        return $this;
    }

    public function getCible(): ?string
    {
        return $this->Cible;
    }

    public function setCible(string $Cible): static
    {
        $this->Cible = $Cible;

        return $this;
    }

    public function getPlanque(): ?string
    {
        return $this->Planque;
    }

    public function setPlanque(string $Planque): static
    {
        $this->Planque = $Planque;

        return $this;
    }

    public function getDateDebut(): ?string
    {
        return $this->DateDebut;
    }

    public function setDateDebut(?string $DateDebut): static
    {
        $this->DateDebut = $DateDebut;

        return $this;
    }

    public function getDateFin(): ?string
    {
        return $this->DateFin;
    }

    public function setDateFin(?string $DateFin): static
    {
        $this->DateFin = $DateFin;

        return $this;
    }
}
