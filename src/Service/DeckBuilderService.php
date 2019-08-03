<?php

namespace App\Service;

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
        $command = GetCharacterVariationsFactory::create($characterID);
        $this->processor->process($command);
        $result = $command->getResult();
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
            $command = GetCollectionPageFactory::create(false, $page++, 12);
            $result = $command->process($this->processor);
 //           $this->processor->process($command);
//            $result = $command->getResult();
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
            $command = GetCollectionPageFactory::create(false, $page++, 12, $clanId);
            $this->processor->process($command);
            $result = $command->getResult();
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
            $command = GetCollectionPageFactory::create(false, $page++, 12, GetCollectionPageFactory::CLAN_ALL, GetCollectionPageFactory::GROUP_BY_BEST);
            $this->processor->process($command);
            $result = $command->getResult();
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
            $command = GetCollectionPageFactory::create(false, $page++, 12, $clanId, GetCollectionPageFactory::GROUP_BY_BEST);
            $this->processor->process($command);
            $result = $command->getResult();
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

        $command = SetSelectionAsDeckFactory::create($characterInCollectionIDs);
        $this->processor->process($command);
        $result = $command->getResult();

        dump($characterInCollectionIDs);
        dump($result->getContext());
    }
}