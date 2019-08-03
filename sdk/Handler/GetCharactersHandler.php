<?php

namespace Sdk\Handler;

use Api\Dto\Command;
use Sdk\Result\GetCharactersResult;

class GetCharactersHandler extends AbstractHandler
{
    public function __invoke(
        array $charactersIDs = [],
        int $clanID = null,
        bool $maxLevels = true
    ): GetCharactersResult {
        $command = new Command('characters.getCharacters', [
            'charactersIDs' => $charactersIDs,
            'clanID'        => $clanID,
            'maxLevels'     => $maxLevels,
        ]);

        return $this->handle($command, GetCharactersResult::class);
    }
}