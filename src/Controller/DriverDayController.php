<?php

namespace App\Controller;

use App\Entity\Driver;
use App\Entity\DriverDay;
use App\Entity\GrandPix;
use App\Form\DriverDayType;

class DriverDayController extends BaseController
{
    public function __construct()
    {
        $this->entity = new DriverDay();
        $this->formType = DriverDayType::class;
        $this->entityType = DriverDay::class;
    }

    protected function create($em, $arr)
    {
        $this->entity->setDriver($em->find(Driver::class, $arr['driver']));
        $this->entity->setGrandPix($em->find(GrandPix::class, $arr['grandPix']));
    }
}
