<?php

namespace App\Service;

use Sdk\Handler\GetCharacterVariationsHandler;
use Sdk\Handler\GetCollectionPageHandler;
use Sdk\Handler\SetSelectionAsDeckHandler;
use Sdk\Model\CharacterWithVariation;

class DeckBuilderService
{

    /**
     * @var GetCharacterVariationsHandler
     */
    private $getCharacterVariationsHandler;

    /**
     * @var GetCollectionPageHandler
     */
    private $getCollectionPageHandler;

    /**
     * @var SetSelectionAsDeckHandler
     */
    private $setSelectionAsDeckHandler;

    public function __construct(
        GetCharacterVariationsHandler $getCharacterVariationsHandler,
        GetCollectionPageHandler $getCollectionPageHandler,
        SetSelectionAsDeckHandler $setSelectionAsDeckHandler
    ) {
        $this->getCharacterVariationsHandler = $getCharacterVariationsHandler;
        $this->getCollectionPageHandler = $getCollectionPageHandler;
        $this->setSelectionAsDeckHandler = $setSelectionAsDeckHandler;
    }

    /**
     * @param int $characterID
     *
     * @return CharacterWithVariation|null
     */
    public function getBestCharacterVariation(int $characterID): ?CharacterWithVariation
    {
        $getCharacterVariationsResult = $this->getCharacterVariationsHandler->handle($characterID);
        $characterVariations = $getCharacterVariationsResult->getItems();

        if (empty($characterVariations)) {
            return null;
        }

        usort($characterVariations, function (CharacterWithVariation $a, CharacterWithVariation $b): int {
            return $a->getLevel() <=> $b->getLevel();
        });

        return $characterVariations[0];
    }

    public function createDeckWithAllCardsFromAllClans(): void
    {
        $characterInCollectionIDs = [];

        $characterVariation = $this->getBestCharacterVariation(273);
        if ($characterVariation instanceof CharacterWithVariation) {
            $characterInCollectionIDs[] = $characterVariation->getIdPlayerCharacter();
        }

        $page = 0;

        do {
            $result = $this->getCollectionPageHandler->handle(false, $page++, 12);
            foreach ($result->getItems() as $item) {
                if ($item->getLevel() < $item->getLevelMax()) {
                    $characterInCollectionIDs[] = $item->getIdPlayerCharacter();
                }
            }
        } while ($result->getContext()['hasNextPage']);

        $this->saveSelection($characterInCollectionIDs);
    }

    public function createDeckWithAllCardsFromOneClan(int $clanId): void
    {
        $characterInCollectionIDs = [];

        $characterVariation = $this->getBestCharacterVariation(273);
        if ($characterVariation instanceof CharacterWithVariation) {
            $characterInCollectionIDs[] = $characterVariation->getIdPlayerCharacter();
        }

        $page = 0;

        do {
            $result = $this->getCollectionPageHandler->handle(false, $page++, 12, $clanId);
            foreach ($result->getItems() as $item) {
                if ($item->getLevel() < $item->getLevelMax()) {
                    $characterInCollectionIDs[] = $item->getIdPlayerCharacter();
                }
            }
        } while ($result->getContext()['hasNextPage']);

        $this->saveSelection($characterInCollectionIDs);
    }

    public function createDeckWithBestCardFromAllClans(): void
    {
        $characterInCollectionIDs = [];

        $characterVariation = $this->getBestCharacterVariation(273);
        if ($characterVariation instanceof CharacterWithVariation) {
            $characterInCollectionIDs[] = $characterVariation->getIdPlayerCharacter();
        }

        $page = 0;

        do {
            $result = $this->getCollectionPageHandler->handle(false, $page++, 12, GetCollectionPageHandler::CLAN_ALL, getCollectionPageHandler::GROUP_BY_BEST);
            foreach ($result->getItems() as $item) {
                if ($item->getLevel() < $item->getLevelMax()) {
                    $characterInCollectionIDs[] = $item->getIdPlayerCharacter();
                }
            }
        } while ($result->getContext()['hasNextPage']);

        $this->saveSelection($characterInCollectionIDs);
    }

    public function createDeckWithBestCardFromOneClan(int $clanId): void
    {
        $characterInCollectionIDs = [];

        $characterVariation = $this->getBestCharacterVariation(273);
        if ($characterVariation instanceof CharacterWithVariation) {
            $characterInCollectionIDs[] = $characterVariation->getIdPlayerCharacter();
        }

        $page = 0;

        do {
            $result = $this->getCollectionPageHandler->handle(false, $page++, 12, $clanId, GetCollectionPageHandler::GROUP_BY_BEST);
            foreach ($result->getItems() as $item) {
                if ($item->getLevel() < $item->getLevelMax()) {
                    $characterInCollectionIDs[] = $item->getIdPlayerCharacter();
                }
            }
        } while ($result->getContext()['hasNextPage']);

        $this->saveSelection($characterInCollectionIDs);
    }

    private function saveSelection(array $characterInCollectionIDs): void
    {
        \jp3cki\fisherYatesShuffle\shuffle($characterInCollectionIDs);

        $result = $this->setSelectionAsDeckHandler->handle($characterInCollectionIDs);

        dump($characterInCollectionIDs);
        dump($result->getContext());
    }
}