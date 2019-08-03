<?php

declare(strict_types=1);

namespace App\Controller;

use Sdk\Factory\GetClanSummaryFactory;
use Sdk\Factory\GetCollectionPageFactory;
use Sdk\Factory\GetPresetsFactory;
use Sdk\Factory\GetCharacterVariationsFactory;
use Sdk\Processor\Processor;
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
    public function getClanSummary(Processor $processor)
    {
        dump(GetClanSummaryFactory::create(38)->process($processor)->getResult());
        die;
    }

    /**
     * @Route("/getPresets")
     */
    public function getPresets(Processor $processor)
    {
        dump(GetPresetsFactory::create()->process($processor)->getResult());
        die;
    }

    /**
     * @Route("/getCollectionPage")
     */
    public function getCollectionPage(Processor $processor)
    {
        dump(GetCollectionPageFactory::create()->process($processor)->getResult());
        die;
    }

    /**
     * @Route("/getCharacterVariations/{characterID}")
     */
    public function getCharacterVariations(int $characterID, Processor $processor)
    {
        dump(GetCharacterVariationsFactory::create($characterID)->process($processor)->getResult());
        die;
    }
}
