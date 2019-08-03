<?php

namespace App\Controller;

use App\Service\Missions;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class CollectionsController
 *
 * @Route("/missions")
 */
class MissionsController
{
    /**
     * @var Missions
     */
    private $missions;

    public function __construct(Missions $missions)
    {
        $this->missions = $missions;
    }

    /**
     * @throws \Exception
     *
     * @Route("/getMissions")
     */
    public function getMissions()
    {
        dump($this->missions->getMissions(Missions::GROUP_COMPLETED)[0]);
        die;
    }

    /**
     * @throws \Exception
     *
     * @Route("/getLastProgressMissions")
     */
    public function getLastProgressMissions()
    {
        dump($this->missions->getLastProgressMissions(5));
        die;
    }

}