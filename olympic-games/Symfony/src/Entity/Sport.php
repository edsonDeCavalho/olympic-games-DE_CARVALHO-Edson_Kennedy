<?php

namespace App\Entity;

use App\Repository\SportRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SportRepository::class)]
class Sport
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $Nom = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $Description = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $Lieu = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $TypeDeSport = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $categorie = null;

    #[ORM\ManyToOne(inversedBy: 'sports')]
    private ?Categorie $categirie = null;

    #[ORM\OneToMany(mappedBy: 'sport', targetEntity: Athletes::class)]
    private Collection $athletes;

    public function __construct()
    {
        $this->athletes = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->Nom;
    }

    public function setNom(?string $Nom): self
    {
        $this->Nom = $Nom;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->Description;
    }

    public function setDescription(?string $Description): self
    {
        $this->Description = $Description;

        return $this;
    }

    public function getLieu(): ?string
    {
        return $this->Lieu;
    }

    public function setLieu(?string $Lieu): self
    {
        $this->Lieu = $Lieu;

        return $this;
    }

    public function getTypeDeSport(): ?string
    {
        return $this->TypeDeSport;
    }

    public function setTypeDeSport(?string $TypeDeSport): self
    {
        $this->TypeDeSport = $TypeDeSport;

        return $this;
    }

    public function getCategorie(): ?string
    {
        return $this->categorie;
    }

    public function setCategorie(?string $categorie): self
    {
        $this->categorie = $categorie;

        return $this;
    }

    public function getCategirie(): ?Categorie
    {
        return $this->categirie;
    }

    public function setCategirie(?Categorie $categirie): self
    {
        $this->categirie = $categirie;

        return $this;
    }

    /**
     * @return Collection<int, Athletes>
     */
    public function getAthletes(): Collection
    {
        return $this->athletes;
    }

    public function addAthlete(Athletes $athlete): self
    {
        if (!$this->athletes->contains($athlete)) {
            $this->athletes->add($athlete);
            $athlete->setSport($this);
        }

        return $this;
    }

    public function removeAthlete(Athletes $athlete): self
    {
        if ($this->athletes->removeElement($athlete)) {
            // set the owning side to null (unless already changed)
            if ($athlete->getSport() === $this) {
                $athlete->setSport(null);
            }
        }

        return $this;
    }
}
