<?php

namespace App\Controller;

use Sdk\Factory\GetLastProgressMissionsFactory;
use Sdk\Factory\GetMissionsFactory;
use Sdk\Processor\Processor;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/missions")
 */
class MissionsController
{
    /**
     * @Route("/getMissions")
     */
    public function getMissions(Processor $processor)
    {
        dump($processor->process(GetMissionsFactory::create(GetMissionsFactory::GROUP_COMPLETED)));
        die;
    }

    /**
     * @Route("/getLastProgressMissions")
     */
    public function getLastProgressMissions(Processor $processor)
    {
        dump($processor->process(GetLastProgressMissionsFactory::create(5)));
        die;
    }

}