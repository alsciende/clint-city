<?php

namespace App\Service;

use Sdk\Api\Client;
use Sdk\Api\Command;
use Sdk\Model\CharacterWithDescription;

class Characters
{
    /**
     * @var Client
     */
    private $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

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
        $items = $this->client->executeCommand(new Command('characters.getCharacters', [
            'charactersIDs' => $charactersIDs,
            'clanID' => $clanID,
            'maxLevels' => $maxLevels,
        ]));

        return $this->client->denormalizeArray($items, CharacterWithDescription::class);
    }

}