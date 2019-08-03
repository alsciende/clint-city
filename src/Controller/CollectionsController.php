<?php

declare(strict_types=1);

namespace App\Controller;

use Sdk\Handler\GetClanSummaryHandler;
use Sdk\Handler\GetCollectionPageHandler;
use Sdk\Handler\GetPresetsHandler;
use Sdk\Handler\GetCharacterVariationsHandler;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/collections")
 */
class CollectionsController extends AbstractController
{
    /**
     * @Route("/getClanSummary")
     */
    public function getClanSummary(GetClanSummaryHandler $handler)
    {
        dump($handler->handle(38));
        die;
    }

    /**
     * @Route("/getPresets")
     */
    public function getPresets(GetPresetsHandler $handler)
    {
        dump($handler->handle());
        die;
    }

    /**
     * @Route("/getCollectionPage")
     */
    public function getCollectionPage(GetCollectionPageHandler $handler)
    {
        dump($handler->handle());
        die;
    }

    /**
     * @Route("/getCharacterVariations/{characterID}")
     */
    public function getCharacterVariations(int $characterID, GetCharacterVariationsHandler $handler)
    {
        dump($handler->handle($characterID));
        die;
    }
}
