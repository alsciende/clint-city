<?php

namespace Sdk\Handler;

use Api\Dto\Command;
use Sdk\Result\GetCharactersResult;

class GetCharactersHandler extends AbstractHandler
{
    public function handle(
        array $charactersIDs = [],
        int $clanID = null,
        bool $maxLevels = true
    ): GetCharactersResult {
        $command = new Command('characters.getCharacters', [
            'charactersIDs' => $charactersIDs,
            'clanID'        => $clanID,
            'maxLevels'     => $maxLevels,
        ]);

        return $this->convert($command, GetCharactersResult::class);
    }
}