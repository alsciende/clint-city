<?php

declare(strict_types=1);

namespace App\Controller;

use App\Service\Characters;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class CharactersController
 *
 * @Route("/characters")
 */
class CharactersController
{
    /**
     * @var Characters
     */
    private $characters;

    /**
     * CharactersController constructor.
     */
    public function __construct(Characters $characters)
    {
        $this->characters = $characters;
    }

    /**
     * @Route("/getCharacters")
     */
    public function getCharacters()
    {
        dump($this->characters->getCharacters([], 42));
        die;
    }
}
