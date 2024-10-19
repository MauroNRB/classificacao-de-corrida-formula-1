<?php

namespace App\Entity;

use App\Repository\TeamRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;


/**
 * @ORM\Entity(repositoryClass=TeamRepository::class)
 */
class Team extends EntityBase implements TeamInterface
{
    /**
     * @ORM\Column(type="string", length=255)
     */
    protected $name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    protected $fullName;

    /**
     * @ORM\Column(type="string", length=255)
     */
    protected $engine;

    /**
     * @ORM\Column(type="datetime")
     */
    protected $yearFoundation;

    /**
     * @ORM\Column(type="integer")
     */
    protected $victory;

    /**
     * @ORM\Column(type="integer")
     */
    protected $podium;

    /**
     * @ORM\Column(type="integer")
     */
    protected $polePosition;

    /**
     * @ORM\Column(type="string", length=255)
     */
    protected $base;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    protected $urlImage;

    /**
     * @ORM\OneToMany(targetEntity=Pilot::class, mappedBy="team")
     */
    private $pilots;

    public function __construct()
    {
        $this->pilots = new ArrayCollection();
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getFullName(): string
    {
        return $this->fullName;
    }

    public function setFullName(string $fullName): self
    {
        $this->fullName = $fullName;

        return $this;
    }

    public function getEngine(): string
    {
        return $this->engine;
    }

    public function setEngine(string $engine): self
    {
        $this->engine = $engine;

        return $this;
    }

    public function getYearFoundation(): \DateTimeInterface
    {
        return $this->yearFoundation;
    }

    public function setYearFoundation(\DateTimeInterface $yearFoundation): self
    {
        $this->yearFoundation = $yearFoundation;

        return $this;
    }

    public function getVictory(): int
    {
        return $this->victory;
    }

    public function setVictory(int $victory): self
    {
        $this->victory = $victory;

        return $this;
    }

    public function getPodium(): int
    {
        return $this->podium;
    }

    public function setPodium(int $podium): self
    {
        $this->podium = $podium;

        return $this;
    }

    public function getPolePosition(): int
    {
        return $this->polePosition;
    }

    public function setPolePosition(int $polePosition): self
    {
        $this->polePosition = $polePosition;

        return $this;
    }

    public function getBase(): string
    {
        return $this->base;
    }

    public function setBase(string $base): self
    {
        $this->base = $base;

        return $this;
    }

    public function getUrlImage(): string
    {
        return $this->urlImage;
    }

    public function setUrlImage(string $urlImage): self
    {
        $this->urlImage = $urlImage;

        return $this;
    }

    /**
     * @return Collection<Pilot>
     */
    public function getPilots(): Collection
    {
        return $this->pilots;
    }

    public function addPilot(Pilot $pilot): self
    {
        if (!$this->pilots->contains($pilot)) {
            $this->pilots[] = $pilot;
            $pilot->setTeam($this);
        }

        return $this;
    }

    public function removePilot(Pilot $pilot): self
    {
        if ($this->pilots->removeElement($pilot)) {
            // set the owning side to null (unless already changed)
            if ($pilot->getTeam() === $this) {
                $pilot->setTeam(null);
            }
        }

        return $this;
    }
}
