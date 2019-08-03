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
        $result = GetMissionsFactory
            ::create(GetMissionsFactory::GROUP_COMPLETED)
            ->process($processor)
            ->getResult();

        dump($result);
        die;
    }

    /**
     * @Route("/getLastProgressMissions")
     */
    public function getLastProgressMissions(Processor $processor)
    {
        $result = GetLastProgressMissionsFactory
            ::create(5)
            ->process($processor)
            ->getResult();

        dump($result);
        die;
    }

}