<?php

namespace App\Entity;

use App\Repository\RecetteRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RecetteRepository::class)]
class Recette
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $titre = null;

    #[ORM\Column]
    private ?int $nombrepersonne = null;

    #[ORM\Column(length: 255)]
    private ?string $description = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $preparation = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $image = null;

    #[ORM\ManyToOne(inversedBy: 'recettes')]
    #[ORM\JoinColumn(nullable: false)]
    private ?user $user = null;

    #[ORM\ManyToOne(inversedBy: 'recette')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Typerepas $typerepas = null;

    /**
     * @var Collection<int, Dosage>
     */
    #[ORM\OneToMany(targetEntity: Dosage::class, mappedBy: 'recette', orphanRemoval: true)]
    private Collection $dosages;

    public function __construct()
    {
        $this->dosages = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(string $titre): static
    {
        $this->titre = $titre;

        return $this;
    }

    public function getNombrepersonne(): ?int
    {
        return $this->nombrepersonne;
    }

    public function setNombrepersonne(int $nombrepersonne): static
    {
        $this->nombrepersonne = $nombrepersonne;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getPreparation(): ?string
    {
        return $this->preparation;
    }

    public function setPreparation(string $preparation): static
    {
        $this->preparation = $preparation;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(?string $image): static
    {
        $this->image = $image;

        return $this;
    }

    public function getUser(): ?user
    {
        return $this->user;
    }

    public function setUser(?user $user): static
    {
        $this->user = $user;

        return $this;
    }

    public function getTyperepas(): ?Typerepas
    {
        return $this->typerepas;
    }

    public function setTyperepas(?Typerepas $typerepas): static
    {
        $this->typerepas = $typerepas;

        return $this;
    }

    /**
     * @return Collection<int, Dosage>
     */
    public function getDosages(): Collection
    {
        return $this->dosages;
    }

    public function addDosage(Dosage $dosage): static
    {
        if (!$this->dosages->contains($dosage)) {
            $this->dosages->add($dosage);
            $dosage->setRecette($this);
        }

        return $this;
    }

    public function removeDosage(Dosage $dosage): static
    {
        if ($this->dosages->removeElement($dosage)) {
            // set the owning side to null (unless already changed)
            if ($dosage->getRecette() === $this) {
                $dosage->setRecette(null);
            }
        }

        return $this;
    }
}
