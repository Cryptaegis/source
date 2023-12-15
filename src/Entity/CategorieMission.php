<?php

namespace App\Entity;

use App\Repository\CategorieMissionRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CategorieMissionRepository::class)]
class CategorieMission
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name_cm = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNameCm(): ?string
    {
        return $this->name_cm;
    }

    public function setNameCm(string $name_cm): static
    {
        $this->name_cm = $name_cm;

        return $this;
    }
}
