<?php

namespace App\Controller;

use App\Entity\GrandPix;
use App\Form\GrandPixType;

class GrandPixController extends BaseController
{
    public function __construct()
    {
        $this->entity = new GrandPix();
        $this->formType = GrandPixType::class;
        $this->entityType = GrandPix::class;
    }

    protected function create($em, $arr)
    {
        $this->entity->setName($arr['name']);
        $this->entity->setKm($arr['km']);
        $this->entity->setCountry($arr['country']);
        $this->entity->setYear($arr['year']);
    }

    protected function update($em, $arr)
    {
        if (!empty($arr['name'])) {
            $this->entity->setName($arr['name']);
        }

        if (!empty($arr['km'])) {
            $this->entity->setKm($arr['km']);
        }

        if (!empty($arr['country'])) {
            $this->entity->setCountry($arr['country']);
        }

        if (!empty($arr['year'])) {
            $this->entity->setYear($arr['year']);
        }
    }
}
