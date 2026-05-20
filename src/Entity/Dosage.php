<?php

namespace App\Entity;

use App\Repository\DosageRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DosageRepository::class)]
class Dosage
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $dosage = null;

    #[ORM\ManyToOne(inversedBy: 'dosages')]
    #[ORM\JoinColumn(nullable: false)]
    private ?recette $recette = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDosage(): ?int
    {
        return $this->dosage;
    }

    public function setDosage(int $dosage): static
    {
        $this->dosage = $dosage;

        return $this;
    }

    public function getRecette(): ?recette
    {
        return $this->recette;
    }

    public function setRecette(?recette $recette): static
    {
        $this->recette = $recette;

        return $this;
    }
}
