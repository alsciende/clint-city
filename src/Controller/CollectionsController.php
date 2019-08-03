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
    /**
     * @Route("/getClanSummary")
     */
    public function getClanSummary(Processor $processor)
    {
        $result = GetClanSummaryCommand
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
        $result = GetPresetsCommand
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
        $result = GetCollectionPageCommand
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
        $result = GetCharacterVariationsCommand
            ::create($characterID)
            ->process($processor)
            ->getResult();

        dump($result);
        die;
    }
}
