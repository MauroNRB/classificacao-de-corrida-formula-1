<?php

namespace App\Controller;

use App\Entity\Driver;
use App\Entity\Team;
use App\Form\DriverType;

class DriverController extends BaseController
{
    public function __construct()
    {
        $this->entity = new Driver();
        $this->formType = DriverType::class;
        $this->entityType = Driver::class;
    }

    protected function create($em, $arr)
    {
        $this->entity->setName($arr['name']);
        $this->entity->setFullName($arr['fullName']);
        $this->entity->setUrlImage($arr['urlImage']);
        $this->entity->setChampionships($arr['championships']);
        $this->entity->setCarNumber($arr['carNumber']);
        $this->entity->setVictory($arr['victory']);
        $this->entity->setPodium($arr['podium']);
        $this->entity->setPolePosition($arr['polePosition']);
        $this->entity->setBirth(\DateTimeImmutable::createFromFormat("Y-m-d", $arr['birth']));
        $this->entity->setTeam($em->find(Team::class, $arr['team']));
    }

    protected function update($em, $arr)
    {
        if (!empty($arr['name'])) {
            $this->entity->setName($arr['name']);
        }

        if (!empty($arr['fullName'])) {
            $this->entity->setFullName($arr['fullName']);
        }

        if (!empty($arr['urlImage'])) {
            $this->entity->setUrlImage($arr['urlImage']);
        }

        if (!empty($arr['championships'])) {
            $this->entity->setChampionships($arr['championships']);
        }

        if (!empty($arr['carNumber'])) {
            $this->entity->setCarNumber($arr['carNumber']);
        }

        if (!empty($arr['victory'])) {
            $this->entity->setVictory($arr['victory']);
        }

        if (!empty($arr['podim'])) {
            $this->entity->setPodium($arr['podim']);
        }

        if (!empty($arr['polePosition'])) {
            $this->entity->setPolePosition($arr['polePosition']);
        }

        if (!empty($arr['birth'])) {
            $this->entity->setBirth(\DateTimeImmutable::createFromFormat("Y-m-d", $arr['birth']));
        }

        if (!empty($arr['team'])) {
            $this->entity->setTeam($em->find(Team::class, $arr['team']));
        }
    }
}
