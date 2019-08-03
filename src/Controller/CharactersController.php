<?php

declare(strict_types=1);

namespace App\Controller;

use Sdk\Command\GetCharactersCommand;
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
        $result = GetCharactersCommand
            ::create([])
            ->process($processor)
            ->getResult();

        dump(count($result->getItems()));
        dump($result->getItems());
        die;
    }

    /**
     * @Route("/getCharacters/{clanId}")
     */
    public function getCharactersByClan(int $clanId, Processor $processor)
    {
        $result = GetCharactersCommand
            ::create([], $clanId)
            ->process($processor)
            ->getResult();

        dump($result);
        die;
    }
}
