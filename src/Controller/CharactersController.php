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
        $result = GetCharactersFactory
            ::create([], 42)
            ->process($processor)
            ->getResult();

        dump($result);
        die;
    }

    /**
     * @Route("/getCharacters/{clanId}")
     */
    public function getCharactersByClan(int $clanId, Processor $processor)
    {
        $result = GetCharactersFactory
            ::create([], $clanId)
            ->process($processor)
            ->getResult();

        dump($result);
        die;
    }
}
