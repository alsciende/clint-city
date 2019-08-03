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
        dump($processor->process(GetClanSummaryFactory::create(38)));
        die;
    }

    /**
     * @Route("/getPresets")
     */
    public function getPresets(Processor $processor)
    {
        dump($processor->process(GetPresetsFactory::create()));
        die;
    }

    /**
     * @Route("/getCollectionPage")
     */
    public function getCollectionPage(Processor $processor)
    {
        dump($processor->process(GetCollectionPageFactory::create()));
        die;
    }

    /**
     * @Route("/getCharacterVariations/{characterID}")
     */
    public function getCharacterVariations(int $characterID, Processor $processor)
    {
        dump($processor->process(GetCharacterVariationsFactory::create($characterID)));
        die;
    }
}
