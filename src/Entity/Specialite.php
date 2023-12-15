<?php

namespace App\Entity;

use App\Repository\SpecialiteRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SpecialiteRepository::class)]
class Specialite
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name_spe = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNameSpe(): ?string
    {
        return $this->name_spe;
    }

    public function setNameSpe(string $name_spe): static
    {
        $this->name_spe = $name_spe;

        return $this;
    }
}
