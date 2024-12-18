<?php

namespace App\Controller;

use App\Entity\Team;
use App\Form\TeamType;

class TeamController extends BaseController
{
    public function __construct()
    {
        $this->entity = new Team();
        $this->formType = TeamType::class;
        $this->entityType = Team::class;
    }

    protected function create($em, $arr)
    {
        $this->entity->setName($arr['name']);
        $this->entity->setFullName($arr['fullName']);
        $this->entity->setUrlImage($arr['urlImage']);
        $this->entity->setEngine($arr['engine']);
        $this->entity->setBase($arr['base']);
        $this->entity->setVictory($arr['victory']);
        $this->entity->setPodium($arr['podium']);
        $this->entity->setPolePosition($arr['polePosition']);
        $this->entity->setYearFoundation(\DateTimeImmutable::createFromFormat("Y-m-d", $arr['yearFoundation']));
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

        if (!empty($arr['engine'])) {
            $this->entity->setEngine($arr['engine']);
        }

        if (!empty($arr['base'])) {
            $this->entity->setBase($arr['base']);
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

        if (!empty($arr['yearFoundation'])) {
            $this->entity->setYearFoundation(\DateTimeImmutable::createFromFormat("Y-m-d", $arr['yearFoundation']));
        }
    }
}
