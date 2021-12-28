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
    private Processor $processor;

    public function __construct(Processor $processor)
    {
        $this->processor = $processor;
    }

    /**
     * @Route("/getMissions")
     */
    public function getMissions()
    {
        $result = GetMissionsCommand
            ::create(GetMissionsCommand::GROUP_COMPLETED)
            ->process($this->processor)
            ->getResult();

        dump($result);
        die;
    }

    /**
     * @Route("/getLastProgressMissions/{nbMissions}")
     */
    public function getLastProgressMissions(int $nbMissions = 5)
    {
        $result = GetLastProgressMissionsCommand
            ::create($nbMissions)
            ->process($this->processor)
            ->getResult();

        dump($result);
        die;
    }

}