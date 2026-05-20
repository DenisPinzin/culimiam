<?php

namespace App\Entity;

use App\Repository\TyperepasRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TyperepasRepository::class)]
class Typerepas
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $type = null;

    #[ORM\Column(length: 30)]
    private ?string $couleur = null;

    /**
     * @var Collection<int, recette>
     */
    #[ORM\OneToMany(targetEntity: recette::class, mappedBy: 'typerepas')]
    private Collection $recette;

    public function __construct()
    {
        $this->recette = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): static
    {
        $this->type = $type;

        return $this;
    }

    public function getCouleur(): ?string
    {
        return $this->couleur;
    }

    public function setCouleur(string $couleur): static
    {
        $this->couleur = $couleur;

        return $this;
    }

    /**
     * @return Collection<int, recette>
     */
    public function getRecette(): Collection
    {
        return $this->recette;
    }

    public function addRecette(recette $recette): static
    {
        if (!$this->recette->contains($recette)) {
            $this->recette->add($recette);
            $recette->setTyperepas($this);
        }

        return $this;
    }

    public function removeRecette(recette $recette): static
    {
        if ($this->recette->removeElement($recette)) {
            // set the owning side to null (unless already changed)
            if ($recette->getTyperepas() === $this) {
                $recette->setTyperepas(null);
            }
        }

        return $this;
    }
}
