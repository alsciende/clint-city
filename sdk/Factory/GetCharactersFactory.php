<?php

namespace Sdk\Factory;

use Api\Dto\Command;
use Sdk\Command\CommandInterface;
use Sdk\Command\GetCharactersCommand;
use Sdk\Result\GetCharactersResult;

class GetCharactersFactory
{
    static public function create(
        array $charactersIDs = [],
        int $clanID = null,
        bool $maxLevels = true
    ) {
        return new GetCharactersCommand([
            'charactersIDs' => $charactersIDs,
            'clanID'        => $clanID,
            'maxLevels'     => $maxLevels,
        ]);
    }
}