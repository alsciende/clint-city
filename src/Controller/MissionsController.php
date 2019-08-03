<?php

namespace App\Controller;

use Sdk\Handler\GetLastProgressMissionsHandler;
use Sdk\Handler\GetMissionsHandler;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/missions")
 */
class MissionsController
{
    /**
     * @Route("/getMissions")
     */
    public function getMissions(GetMissionsHandler $handler)
    {
        dump($handler(GetMissionsHandler::GROUP_COMPLETED));
        die;
    }

    /**
     * @Route("/getLastProgressMissions")
     */
    public function getLastProgressMissions(GetLastProgressMissionsHandler $handler)
    {
        dump($handler(5));
        die;
    }

}