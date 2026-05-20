<?php

namespace App\Entity;

use App\Repository\IngredientRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: IngredientRepository::class)]
class Ingredient
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 100)]
    private ?string $nom = null;

    #[ORM\Column(length: 20)]
    private ?string $mesure = null;

    /**
     * @var Collection<int, dosage>
     */
    #[ORM\OneToMany(targetEntity: dosage::class, mappedBy: 'ingredient', orphanRemoval: true)]
    private Collection $dosage;

    public function __construct()
    {
        $this->dosage = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): static
    {
        $this->nom = $nom;

        return $this;
    }

    public function getMesure(): ?string
    {
        return $this->mesure;
    }

    public function setMesure(string $mesure): static
    {
        $this->mesure = $mesure;

        return $this;
    }

    /**
     * @return Collection<int, dosage>
     */
    public function getDosage(): Collection
    {
        return $this->dosage;
    }

    public function addDosage(dosage $dosage): static
    {
        if (!$this->dosage->contains($dosage)) {
            $this->dosage->add($dosage);
            $dosage->setIngredient($this);
        }

        return $this;
    }

    public function removeDosage(dosage $dosage): static
    {
        if ($this->dosage->removeElement($dosage)) {
            // set the owning side to null (unless already changed)
            if ($dosage->getIngredient() === $this) {
                $dosage->setIngredient(null);
            }
        }

        return $this;
    }
}
