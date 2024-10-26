<?php

namespace App\Entity;

use App\Repository\DriverRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=DriverRepository::class)
 */
class Driver extends EntityBase implements DriverInterface
{
    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $fullName;

    /**
     * @ORM\Column(type="datetime")
     */
    private $birth;

    /**
     * @ORM\ManyToOne(targetEntity=Team::class, inversedBy="drivers")
     */
    private $team;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $urlImage;

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
     * @ORM\Column(type="integer")
     */
    private $championships;

    /**
     * @ORM\Column(type="integer")
     */
    private $carNumber;

    /**
     * @ORM\OneToMany(targetEntity=DriverDay::class, mappedBy="driver")
     */
    private $driverDays;

    public function __construct()
    {
        $this->driverDays = new ArrayCollection();
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

    public function getBirth(): \DateTimeInterface
    {
        return $this->birth;
    }

    public function setBirth(\DateTimeInterface $birth): self
    {
        $this->birth = $birth;

        return $this;
    }

    public function getTeam(): ?Team
    {
        return $this->team;
    }

    public function setTeam(?Team $team): self
    {
        $this->team = $team;

        return $this;
    }

    public function getUrlImage(): string
    {
        return $this->urlImage;
    }

    public function setUrlImage(?string $urlImage): self
    {
        $this->urlImage = $urlImage;

        return $this;
    }

    public function getChampionships(): int
    {
        return $this->championships;
    }

    public function setChampionships(int $championships): self
    {
        $this->championships = $championships;

        return $this;
    }

    public function getCarNumber(): int
    {
        return $this->carNumber;
    }

    public function setCarNumber(int $carNumber): self
    {
        $this->carNumber = $carNumber;

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

    public function getDriverDays(): Collection
    {
        return $this->driverDays;
    }

    public function addDriverDay(DriverDay $driverDay): self
    {
        if (!$this->driverDays->contains($driverDay)) {
            $this->driverDays[] = $driverDay;
            $driverDay->setDriver($this);
        }

        return $this;
    }

    public function removeDriverDay(DriverDay $driverDay): self
    {
        if ($this->driverDays->removeElement($driverDay)) {
            if ($driverDay->getDriver() === $this) {
                $driverDay->setDriver(null);
            }
        }

        return $this;
    }

    public function getArrayEntity(): array
    {
        return array(
            'id' => $this->getId(),
            'name' => $this->getName(),
            'fullName' => $this->getFullName(),
            'birth' => $this->getBirth(),
            'urlImage' => $this->getUrlImage(),
            'championships' => $this->getChampionships(),
            'carNumber' => $this->getCarNumber(),
            'victory' => $this->getVictory(),
            'podium' => $this->getPodium(),
            'polePosition' => $this->getPolePosition(),
            'team' => $this->getTeam() instanceof TeamInterface ? $this->getTeam()->getArrayEntity() : array(),
        );
    }
}
