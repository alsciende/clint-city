<?php

declare(strict_types=1);

namespace App\Service;

use Sdk\Api\Client;
use Sdk\Api\Command;
use Sdk\Model\CharacterWithDescriptionAndSummary;
use Sdk\Model\CharacterWithDescriptionAndSummaryAndVariation;
use Sdk\Model\CharacterWithVariation;
use Sdk\Model\Preset;

class Collections
{
    const GROUP_BY_ALL = 'all';
    const GROUP_BY_DOUBLE = 'double';
    const GROUP_BY_EVOLVE = 'evolve';
    const GROUP_BY_MAXED = 'maxed';
    const GROUP_BY_NODECK = 'nodeck';
    const GROUP_BY_BEST = 'best';

    const CLAN_ALL = 0;

    /**
     * @var Client
     */
    private $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    public function getLastContext(): array
    {
        return $this->client->getLastContext();
    }

    /**
     * @param int $characterID
     *
     * @return CharacterWithVariation[]
     */
    public function getCharacterVariations(int $characterID): array
    {
        $items = $this->client->executeCommand(new Command('collections.getCharacterVariations', [
            'characterID' => $characterID,
        ]));

        return $this->client->denormalizeArray($items, CharacterWithVariation::class);
    }

    /**
     * @param int $characterID
     *
     * @return CharacterWithVariation|null
     */
    public function getBestCharacterVariation(int $characterID): ?CharacterWithVariation
    {
        $characterVariations = $this->getCharacterVariations($characterID);

        if (empty($characterVariations)) {
            return null;
        }

        usort($characterVariations, function (CharacterWithVariation $a, CharacterWithVariation $b): int {
            return $a->getLevel() <=> $b->getLevel();
        });

        return $characterVariations[0];
    }

    /**
     * @param bool   $deckOnly
     * @param int    $page
     * @param int    $nbPerPage
     * @param int    $clanID
     * @param string $groupBy
     *
     * @return CharacterWithVariation[]
     */
    public function getCollectionPage(
        bool $deckOnly = false,
        int $page = 0,
        int $nbPerPage = 12,
        int $clanID = 0,
        string $groupBy = self::GROUP_BY_ALL
    ): array {
        $items = $this->client->executeCommand(new Command('collections.getCollectionPage', [
            'deckOnly' => $deckOnly,
            'page' => $page,
            'nbPerPage' => $nbPerPage,
            'clanID' => $clanID,
            'groupBy' => $groupBy,
        ]));

        return $this->client->denormalizeArray($items, CharacterWithVariation::class);
    }

    /**
     * @param array $characterInCollectionIDs
     */
    public function setSelectionAsDeck(array $characterInCollectionIDs = []): void
    {
        $this->client->executeCommand(new Command('collections.setSelectionAsDeck', [
            'characterInCollectionIDs' => $characterInCollectionIDs,
        ]));
    }

    /**
     * @param int  $clanID
     * @param bool $addBestCharacter
     * @param bool $ownedOnly
     *
     * @return CharacterWithDescriptionAndSummary[]
     */
    public function getClanSummary(int $clanID = 0, bool $addBestCharacter = false, bool $ownedOnly = false)
    {
        $items = $this->client->executeCommand(new Command('collections.getClanSummary', [
            'clanID' => $clanID,
            'addBestCharacter' => $addBestCharacter,
            'ownedOnly' => $ownedOnly,
        ]));

        return $this->client->denormalizeArray($items, $addBestCharacter ? CharacterWithDescriptionAndSummaryAndVariation::class : CharacterWithDescriptionAndSummary::class);
    }

    /**
     * @param int|null $deckFormatID
     *
     * @return Preset[]
     */
    public function getPresets(int $deckFormatID = null)
    {
        $items = $this->client->executeCommand(new Command('collections.getPresets', [
            'deckFormatID' => $deckFormatID,
        ]));

        return $this->client->denormalizeArray($items, Preset::class);
    }
}
