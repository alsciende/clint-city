<?php

declare(strict_types=1);

namespace App\Controller;

use Sdk\Command\GetCharacterVariationsCommand;
use Sdk\Command\GetClanSummaryCommand;
use Sdk\Command\GetCollectionPageCommand;
use Sdk\Command\GetPresetsCommand;
use Sdk\Processor\Processor;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/collections")
 */
class CollectionsController extends AbstractController
{
    private Processor $processor;

    public function __construct(Processor $processor)
    {
        $this->processor = $processor;
    }

    /**
     * @Route("/getClanSummary/{clanID}")
     */
    public function getClanSummary(int $clanID = 42)
    {
        $result = GetClanSummaryCommand
            ::create($clanID)
            ->process($this->processor)
            ->getResult();

        dump($result);
        die;
    }

    /**
     * @Route("/getPresets")
     */
    public function getPresets()
    {
        $result = GetPresetsCommand
            ::create()
            ->process($this->processor)
            ->getResult();

        dump($result);
        die;
    }

    /**
     * @Route("/getCollectionPage/{page}")
     */
    public function getCollectionPage(int $page)
    {
        $result = GetCollectionPageCommand
            ::create(false, $page)
            ->process($this->processor)
            ->getResult();

        dump($result);
        die;
    }

    /**
     * @Route("/getCharacterVariations/{characterID}")
     */
    public function getCharacterVariations(int $characterID = 325)
    {
        $result = GetCharacterVariationsCommand
            ::create($characterID)
            ->process($this->processor)
            ->getResult();

        dump($result);
        die;
    }
}
