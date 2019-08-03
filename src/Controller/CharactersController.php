<?php

declare(strict_types=1);

namespace App\Controller;

use Sdk\Factory\GetCharactersFactory;
use Sdk\Processor\Processor;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/characters")
 */
class CharactersController
{
    /**
     * @Route("/getCharacters")
     */
    public function getCharacters(Processor $processor)
    {
        dump($processor->process(GetCharactersFactory::create([], 42)));
        die;
    }

    /**
     * @Route("/getCharacters/{clanId}")
     */
    public function getCharactersByClan(int $clanId, Processor $processor)
    {
        dump($processor->process(GetCharactersFactory::create([], $clanId)));
        die;
    }
}
