<?php

namespace App\Entity;

interface DriverDayInterface extends EntityBaseInterface
{
    /**
     * @return Driver
     */
    public function getDriver(): Driver;

    /**
     * @param Driver $driver
     */
    public function setDriver(Driver $driver);

    /**
     * @return GrandPix
     */
    public function getGrandPix(): GrandPix;

    /**
     * @param GrandPix $grandPix
     */
    public function setGrandPix(GrandPix $grandPix);
}