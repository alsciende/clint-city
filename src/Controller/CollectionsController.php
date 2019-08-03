<?php

declare(strict_types=1);

namespace App\Controller;

use App\Service\Collections;
use Sdk\Message\GetCharacterVariationsQuery;
use Sdk\MessageHandler\GetCharacterVariationsHandler;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class CollectionsController
 *
 * @Route("/collections")
 */
class CollectionsController extends AbstractController
{
    /**
     * @var Collections
     */
    private $collections;

    /**
     * CharactersController constructor.
     */
    public function __construct(Collections $collections)
    {
        $this->collections = $collections;
    }

    /**
     * @throws \Exception
     *
     * @Route("/getClanSummary")
     */
    public function getClanSummary()
    {
        dump($this->collections->getClanSummary(38));
        die;
    }

    /**
     * @throws \Exception
     *
     * @Route("/getPresets")
     */
    public function getPresets()
    {
        dump($this->collections->getPresets());
        die;
    }

    /**
     * @throws \Exception
     *
     * @Route("/getCollectionPage")
     */
    public function getCollectionPage()
    {
        dump($this->collections->getCollectionPage());
        die;
    }

    /**
     * @throws \Exception
     *
     * @Route("/getCharacterVariations/{characterID}")
     */
    public function getCharacterVariations(int $characterID, GetCharacterVariationsHandler $handler)
    {
        $query = new GetCharacterVariationsQuery($characterID);
        $result = $handler($query);

        dump($result);
        die;
    }
}
