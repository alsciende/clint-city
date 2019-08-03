<?php

namespace Sdk\Api;

use Sdk\Model\CharacterWithDescription;

class Characters extends Client
{
    /**
     * @param array    $charactersIDs
     * @param int|null $clanID
     * @param bool     $maxLevels
     * @return CharacterWithDescription[]
     */
    public function getCharacters(
        array $charactersIDs = [],
        int $clanID = null,
        bool $maxLevels = true
    ): array
    {
        $items = $this->executeCommand(new Command('characters.getCharacters', [
            'charactersIDs' => $charactersIDs,
            'clanID' => $clanID,
            'maxLevels' => $maxLevels,
        ]));

        return $this->denormalizeArray($items, CharacterWithDescription::class);
    }

}