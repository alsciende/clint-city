<?php

namespace App\Controller;

use Sdk\Command\GetLastProgressMissionsCommand;
use Sdk\Command\GetMissionsCommand;
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
        $result = GetMissionsCommand
            ::create(GetMissionsCommand::GROUP_COMPLETED)
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
        $result = GetLastProgressMissionsCommand
            ::create(5)
            ->process($processor)
            ->getResult();

        dump($result);
        die;
    }

}