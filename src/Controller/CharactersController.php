<?php

declare(strict_types=1);

namespace App\Controller;

use Sdk\Handler\GetCharactersHandler;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/characters")
 */
class CharactersController
{
    /**
     * @Route("/getCharacters")
     */
    public function getCharacters(GetCharactersHandler $handler)
    {
        dump($handler([], 42));
        die;
    }

    /**
     * @Route("/getCharacters/{clanId}")
     */
    public function getCharactersByClan(int $clanId, GetCharactersHandler $handler)
    {
        dump($handler([], $clanId));
        die;
    }
}
