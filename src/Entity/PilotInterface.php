<?php

namespace App\Entity;

interface PilotInterface extends EntityBaseInterface
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
     * @return \DateTimeInterface
     */
    public function getBirth(): \DateTimeInterface;

    /**
     * @param \DateTimeInterface $birth
     */
    public function setBirth(\DateTimeInterface $birth);

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
    public function getUrlImage(): string;

    /**
     * @param string $urlImage
     */
    public function setUrlImage(string $urlImage);

    /**
     * @return ?Team
     */
    public function getTeam(): ?Team;

    /**
     * @param ?Team $team
     */
    public function setTeam(?Team $team);

    /**
     * @return int
     */
    public function getChampionships(): int;

    /**
     * @param int $championships
     */
    public function setChampionships(int $championships);
}