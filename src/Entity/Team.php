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
     * @ORM\OneToMany(targetEntity=Driver::class, mappedBy="team")
     */
    private $drivers;

    public function __construct()
    {
        $this->drivers = new ArrayCollection();
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
     * @return Collection<Driver>
     */
    public function getDrivers(): Collection
    {
        return $this->drivers;
    }

    public function addDriver(Driver $driver): self
    {
        if (!$this->drivers->contains($driver)) {
            $this->drivers[] = $driver;
            $driver->setTeam($this);
        }

        return $this;
    }

    public function removeDriver(Driver $driver): self
    {
        if ($this->drivers->removeElement($driver)) {
            if ($driver->getTeam() === $this) {
                $driver->setTeam(null);
            }
        }

        return $this;
    }

    public function getArrayEntity(): array
    {
        $arrDrivers = array();
        $drivers = $this->getDrivers();
        foreach ($drivers as $driver) {
            if ($driver instanceof DriverInterface) {
                $arrDrivers[] = array(
                    'id' => $driver->getId(),
                    'name' => $driver->getName(),
                    'fullName' => $driver->getFullName(),
                    'birth' => $driver->getBirth(),
                    'urlImage' => $driver->getUrlImage(),
                    'championships' => $driver->getChampionships(),
                    'carNumber' => $driver->getCarNumber(),
                    'victory' => $driver->getVictory(),
                    'podium' => $driver->getPodium(),
                    'polePosition' => $driver->getPolePosition(),
                );
            }
        }

        return array(
            'id' => $this->getId(),
            'name' => $this->getName(),
            'fullName' => $this->getFullName(),
            'engine' => $this->getEngine(),
            'yearFoundation' => $this->getYearFoundation(),
            'victory' => $this->getVictory(),
            'podium' => $this->getPodium(),
            'polePosition' => $this->getPolePosition(),
            'base' => $this->getBase(),
            'urlImage' => $this->getUrlImage(),
            'drivers' => $arrDrivers,
        );
    }
}
