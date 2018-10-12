<?php
/**
 * @author      Wizacha DevTeam <dev@wizacha.com>
 * @copyright   Copyright (c) Wizacha
 * @license     Proprietary
 */


namespace App\Controller;

use App\Api\Command;
use App\Api\Request;
use App\Oauth\Factory;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

/**
 * Class CollectionsController
 * @package App\Controller
 *
 * @Route("/collections")
 */
class CollectionsController
{
    /**
     * @var Factory
     */
    private $factory;

    /**
     * CharactersController constructor.
     */
    public function __construct(Factory $factory)
    {
        $this->factory = $factory;
    }

    /**
     * @throws \Exception
     *
     * @Route("/getClanSummary")
     */
    public function getClanSummary()
    {
        $command = new Command('collections.getClanSummary');

        $this->factory->execute(new Request($command));

        dump($command->getResult());
        die;
    }

    /**
     * @throws \Exception
     *
     * @Route("/getPresets")
     */
    public function getPresets()
    {
        $command = new Command('collections.getPresets');

        $this->factory->execute(new Request($command));

        dump($command->getResult());
        die;
    }
}