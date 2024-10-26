<?php

namespace App\Entity;

use Doctrine\Common\Collections\Collection;

interface GrandPixInterface extends EntityBaseInterface
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
     * @return int
     */
    public function getKm(): int;

    /**
     * @param int $km
     */
    public function setKm(int $km);

    /**
     * @return Collection
     */
    public function getDriverDays(): Collection;

    /**
     * @param DriverDay $driverDay
     */
    public function addDriverDay(DriverDay $driverDay);

    /**
     * @param DriverDay $driverDay
     */
    public function removeDriverDay(DriverDay $driverDay);

    /**
     * @return int
     */
    public function getYear(): int;

    /**
     * @param int $year
     */
    public function setYear(int $year);

    /**
     * @return string
     */
    public function getCountry(): string;

    /**
     * @param string $country
     */
    public function setCountry(string $country);
}