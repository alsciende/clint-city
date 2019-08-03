<?php

declare(strict_types=1);

namespace App\Controller;

use App\Service\DeckBuilderService;
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
     * @var DeckBuilderService
     */
    private $service;

    /**
     * DeckBuilderController constructor.
     */
    public function __construct(DeckBuilderService $service)
    {
        $this->service = $service;
    }

    /**
     * Build a deck with all the cards from all clans that are not at max level
     *
     * @Route("/all")
     */
    public function createAllClans()
    {
        $this->service->createDeckWithAllCardsFromAllClans();
        die;
    }

    /**
     * Build a deck with all the cards from a clan that are not at max level
     *
     * @Route("/all/{clanId}")
     */
    public function createAll(int $clanId)
    {
        $this->service->createDeckWithAllCardsFromOneClan($clanId);
        die;
    }

    /**
     * Build a deck with the best copy of each cards from all clans that are not at max level
     *
     * @Route("/best")
     */
    public function createAllBest()
    {
        $this->service->createDeckWithBestCardFromAllClans();
    }

    /**
     * Build a deck with the best copy of each cards from a clan that are not at max level
     *
     * @Route("/best/{clanId}")
     */
    public function createBest(int $clanId)
    {
        $this->service->createDeckWithBestCardFromOneClan($clanId);
    }
}
