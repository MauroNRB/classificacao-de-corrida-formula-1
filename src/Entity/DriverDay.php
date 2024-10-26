<?php

namespace App\Entity;

use App\Repository\DriverDayRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=DriverDayRepository::class)
 */
class DriverDay implements DriverDayInterface
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Driver::class, inversedBy="driverDays")
     * @ORM\JoinColumn(nullable=false)
     */
    private $driver;

    /**
     * @ORM\ManyToOne(targetEntity=GrandPix::class, inversedBy="yes")
     * @ORM\JoinColumn(nullable=false)
     */
    private $grandPix;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDriver(): Driver
    {
        return $this->driver;
    }

    public function setDriver(Driver $driver): self
    {
        $this->driver = $driver;

        return $this;
    }

    public function getGrandPix(): GrandPix
    {
        return $this->grandPix;
    }

    public function setGrandPix(GrandPix $grandPix): self
    {
        $this->grandPix = $grandPix;

        return $this;
    }

    public function getArrayEntity(): array
    {
        return array(
            'id' => $this->getId(),
            'driver' => $this->getDriver() instanceof DriverInterface ? $this->getDriver()->getArrayEntity() : array(),
            'grandPix' => $this->getGrandPix() instanceof GrandPixInterface ? $this->getGrandPix()->getArrayEntity() : array(),
        );
    }
}
