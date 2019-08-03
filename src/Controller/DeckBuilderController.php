<?php

declare(strict_types=1);

namespace App\Controller;

use Sdk\Api\Collections;
use Sdk\Model\CharacterWithVariation;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class DeckBuilderController
 *
 * @Route("/deck-builder")
 */
class DeckBuilderController
{
    /**
     * @var Collections
     */
    private $collections;

    /**
     * DeckBuilderController constructor.
     */
    public function __construct(Collections $collections)
    {
        $this->collections = $collections;
    }

    /**
     * Build a deck with all the cards from all clans that are not at max level
     *
     * @throws \Exception
     *
     * @Route("/all")
     */
    public function createAllClans()
    {
        $characterInCollectionIDs = [];

        $characterVariation = $this->collections->getBestCharacterVariation(273);
        if ($characterVariation instanceof CharacterWithVariation) {
            $characterInCollectionIDs[] = $characterVariation->getIdPlayerCharacter();
        }

        $page = 0;

        do {
            foreach ($this->collections->getCollectionPage(false, $page++, 12) as $item) {
                if ($item->getLevel() < $item->getLevelMax()) {
                    $characterInCollectionIDs[] = $item->getIdPlayerCharacter();
                }
            }
        } while ($this->collections->getLastContext()['hasNextPage']);

        \jp3cki\fisherYatesShuffle\shuffle($characterInCollectionIDs);

        $this->collections->setSelectionAsDeck($characterInCollectionIDs);

        dump($characterInCollectionIDs);
        dump($this->collections->getLastContext());

        die;
    }

    /**
     * Build a deck with all the cards from a clan that are not at max level
     *
     * @throws \Exception
     *
     * @Route("/all/{clanId}")
     */
    public function createAll(int $clanId)
    {
        $characterInCollectionIDs = [];

        $characterVariation = $this->collections->getBestCharacterVariation(273);
        if ($characterVariation instanceof CharacterWithVariation) {
            $characterInCollectionIDs[] = $characterVariation->getIdPlayerCharacter();
        }

        $page = 0;

        do {
            foreach ($this->collections->getCollectionPage(false, $page++, 12, $clanId) as $item) {
                if ($item->getLevel() < $item->getLevelMax()) {
                    $characterInCollectionIDs[] = $item->getIdPlayerCharacter();
                }
            }
        } while ($this->collections->getLastContext()['hasNextPage']);

        \jp3cki\fisherYatesShuffle\shuffle($characterInCollectionIDs);

        $this->collections->setSelectionAsDeck($characterInCollectionIDs);

        dump($characterInCollectionIDs);
        dump($this->collections->getLastContext());

        die;
    }

    /**
     * Build a deck with the best copy of each cards from all clans that are not at max level
     *
     * @throws \Exception
     *
     * @Route("/best")
     */
    public function createAllBest()
    {
        $characterInCollectionIDs = [];

        $characterVariation = $this->collections->getBestCharacterVariation(273);
        if ($characterVariation instanceof CharacterWithVariation) {
            $characterInCollectionIDs[] = $characterVariation->getIdPlayerCharacter();
        }

        $page = 0;

        do {
            foreach ($this->collections->getCollectionPage(false, $page++, 12, Collections::CLAN_ALL, Collections::GROUP_BY_BEST) as $item) {
                if ($item->getLevel() < $item->getLevelMax()) {
                    $characterInCollectionIDs[] = $item->getIdPlayerCharacter();
                }
            }
        } while ($this->collections->getLastContext()['hasNextPage']);

        \jp3cki\fisherYatesShuffle\shuffle($characterInCollectionIDs);

        $this->collections->setSelectionAsDeck($characterInCollectionIDs);

        dump($characterInCollectionIDs);
        dump($this->collections->getLastContext());

        die;
    }

    /**
     * Build a deck with the best copy of each cards from a clan that are not at max level
     *
     * @throws \Exception
     *
     * @Route("/best/{clanId}")
     */
    public function createBest(int $clanId)
    {
        $characterInCollectionIDs = [];

        $characterVariation = $this->collections->getBestCharacterVariation(273);
        if ($characterVariation instanceof CharacterWithVariation) {
            $characterInCollectionIDs[] = $characterVariation->getIdPlayerCharacter();
        }

        $page = 0;

        do {
            foreach ($this->collections->getCollectionPage(false, $page++, 12, $clanId, Collections::GROUP_BY_BEST) as $item) {
                if ($item->getLevel() < $item->getLevelMax()) {
                    $characterInCollectionIDs[] = $item->getIdPlayerCharacter();
                }
            }
        } while ($this->collections->getLastContext()['hasNextPage']);

        \jp3cki\fisherYatesShuffle\shuffle($characterInCollectionIDs);

        $this->collections->setSelectionAsDeck($characterInCollectionIDs);

        dump($characterInCollectionIDs);
        dump($this->collections->getLastContext());

        die;
    }
}
