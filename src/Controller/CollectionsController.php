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
        $result = GetClanSummaryFactory
            ::create(38)
            ->process($processor)
            ->getResult();

        dump($result);
        die;
    }

    /**
     * @Route("/getPresets")
     */
    public function getPresets(Processor $processor)
    {
        $result = GetPresetsFactory
            ::create()
            ->process($processor)
            ->getResult();

        dump($result);
        die;
    }

    /**
     * @Route("/getCollectionPage")
     */
    public function getCollectionPage(Processor $processor)
    {
        $result = GetCollectionPageFactory
            ::create()
            ->process($processor)
            ->getResult();

        dump($result);
        die;
    }

    /**
     * @Route("/getCharacterVariations/{characterID}")
     */
    public function getCharacterVariations(int $characterID, Processor $processor)
    {
        $result = GetCharacterVariationsFactory
            ::create($characterID)
            ->process($processor)
            ->getResult();

        dump($result);
        die;
    }
}
