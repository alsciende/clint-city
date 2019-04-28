<?php

namespace App\Controller;

use App\Api\Command;
use App\Api\Request;
use App\Oauth\Factory;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

/**
 * Class CharactersController
 * @package App\Controller
 *
 * @Route("/characters")
 */
class CharactersController
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
     * @Route("/getCharacters")
     */
    public function getCharacters()
    {
        $command = new Command('characters.getCharacters');

        $this->factory->execute(new Request($command));

        dump($command->getResult());
        die;
    }
}