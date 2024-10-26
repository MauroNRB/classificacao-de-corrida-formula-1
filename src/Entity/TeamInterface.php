<?php

namespace App\Entity;

use Doctrine\Common\Collections\Collection;

interface TeamInterface extends EntityBaseInterface
{
    /**
     * @return string
     */
    public function getName(): string;

    /**
     * @param string $name
     */
    public function setName(string $name);

    /**
     * @return string
     */
    public function getFullName(): string;

    /**
     * @param string $fullName
     */
    public function setFullName(string $fullName);

    /**
     * @return string
     */
    public function getEngine(): string;

    /**
     * @param string $engine
     */
    public function setEngine(string $engine);

    /**
     * @return \DateTimeInterface
     */
    public function getYearFoundation(): \DateTimeInterface;

    /**
     * @param \DateTimeInterface $yearFoundation
     */
    public function setYearFoundation(\DateTimeInterface $yearFoundation);

    /**
     * @return int
     */
    public function getVictory(): int;

    /**
     * @param int $victory
     */
    public function setVictory(int $victory);

    /**
     * @return int
     */
    public function getPodium(): int;

    /**
     * @param int $podium
     */
    public function setPodium(int $podium);

    /**
     * @return int
     */
    public function getPolePosition(): int;

    /**
     * @param int $polePosition
     */
    public function setPolePosition(int $polePosition);

    /**
     * @return string
     */
    public function getBase(): string;

    /**
     * @param string $base
     */
    public function setBase(string $base);

    /**
     * @return string
     */
    public function getUrlImage(): string;

    /**
     * @param string $urlImage
     */
    public function setUrlImage(string $urlImage);

    /**
     * @return Collection<Driver>
     */
    public function getDrivers(): Collection;

    /**
     * @param Driver $driver
     */
    public function addDriver(Driver $driver);

    /**
     * @param Driver $driver
     */
    public function removeDriver(Driver $driver);
}