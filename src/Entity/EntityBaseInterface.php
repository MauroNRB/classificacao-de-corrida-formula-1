<?php

namespace App\Entity;

interface EntityBaseInterface
{
    /**
     * @return integer
     */
    public function getId(): ?int;

    /**
     * @return array
     */
    public function getArrayEntity(): array;
}