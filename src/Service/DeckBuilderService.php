<?php

namespace App\Service;

use Sdk\Command\GetCharacterVariationsCommand;
use Sdk\Command\GetCollectionPageCommand;
use Sdk\Command\SetSelectionAsDeckCommand;
use Sdk\Factory\GetCharacterVariationsFactory;
use Sdk\Factory\GetCollectionPageFactory;
use Sdk\Factory\SetSelectionAsDeckFactory;
use Sdk\Model\CharacterWithVariation;
use Sdk\Processor\Processor;

class DeckBuilderService
{
    /**
     * @var Processor
     */
    private $processor;

    public function __construct(
        Processor $processor
    ) {
        $this->processor = $processor;
    }

    /**
     * @param int $characterID
     *
     * @return CharacterWithVariation|null
     */
    public function getBestCharacterVariation(int $characterID): ?CharacterWithVariation
    {
        $result = GetCharacterVariationsCommand
            ::create($characterID)
            ->process($this->processor)
            ->getResult();

        $characterVariations = $result->getItems();

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
            $result = GetCollectionPageCommand
                ::create(false, $page++, 12)
                ->process($this->processor)
                ->getResult();

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
            $result = GetCollectionPageCommand
                ::create(false, $page++, 12, $clanId)
                ->process($this->processor)
                ->getResult();

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
            $result = GetCollectionPageCommand
                ::create(false, $page++, 12, GetCollectionPageCommand::CLAN_ALL, GetCollectionPageCommand::GROUP_BY_BEST)
                ->process($this->processor)
                ->getResult();

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
            $result = GetCollectionPageCommand
                ::create(false, $page++, 12, $clanId, GetCollectionPageCommand::GROUP_BY_BEST)
                ->process($this->processor)
                ->getResult();

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

        $result = SetSelectionAsDeckCommand
            ::create($characterInCollectionIDs)
            ->process($this->processor)
            ->getResult();

        dump($characterInCollectionIDs);
        dump($result->getContext());
    }
}