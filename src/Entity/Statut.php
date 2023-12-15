<?php

namespace App\Entity;

use App\Repository\StatutRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: StatutRepository::class)]
class Statut
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name_stat = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNameStat(): ?string
    {
        return $this->name_stat;
    }

    public function setNameStat(string $name_stat): static
    {
        $this->name_stat = $name_stat;

        return $this;
    }
}
