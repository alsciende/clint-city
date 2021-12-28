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
    private Processor $processor;

    public function __construct(Processor $processor)
    {
        $this->processor = $processor;
    }

    /**
     * @Route("/getCharacters")
     */
    public function getCharacters()
    {
        $result = GetCharactersCommand
            ::create([])
            ->process($this->processor)
            ->getResult();

        dump(count($result->getItems()));
        dump($result->getItems());
        die;
    }

    /**
     * @Route("/getCharacters/{clanId}")
     */
    public function getCharactersByClan(int $clanId)
    {
        $result = GetCharactersCommand
            ::create([], $clanId)
            ->process($this->processor)
            ->getResult();

        dump($result);
        die;
    }
}
