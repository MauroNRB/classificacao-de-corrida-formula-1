<?php

namespace App\Entity;

use App\Repository\GrandPixRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=GrandPixRepository::class)
 */
class GrandPix implements GrandPixInterface
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="integer")
     */
    private $km;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $country;

    /**
     * @ORM\OneToMany(targetEntity=DriverDay::class, mappedBy="grandPix")
     */
    private $driverDays;

    /**
     * @ORM\Column(type="integer")
     */
    private $year;

    public function __construct()
    {
        $this->driverDays = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    public function getKm(): int
    {
        return $this->km;
    }

    public function setKm(int $km): self
    {
        $this->km = $km;

        return $this;
    }

    public function getCountry(): string
    {
        return $this->country;
    }

    public function setCountry(string $country): self
    {
        $this->country = $country;

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
            $driverDay->setGrandPix($this);
        }

        return $this;
    }

    public function removeDriverDay(DriverDay $driverDay): self
    {
        if ($this->driverDays->removeElement($driverDay)) {
            // set the owning side to null (unless already changed)
            if ($driverDay->getGrandPix() === $this) {
                $driverDay->setGrandPix(null);
            }
        }

        return $this;
    }

    public function getYear(): int
    {
        return $this->year;
    }

    public function setYear(int $year): self
    {
        $this->year = $year;

        return $this;
    }

    public function getArrayEntity(): array
    {
        return array(
            'id' => $this->getId(),
            'name' => $this->getName(),
            'km' => $this->getKm(),
            'country' => $this->getCountry(),
            'year' => $this->getYear(),
        );
    }
}
