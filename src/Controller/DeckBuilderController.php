<?php

namespace App\Controller;

use App\Api\Command;
use App\Api\Request;
use App\Oauth\Factory;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

/**
 * Class DeckBuilderController
 * @package App\Controller
 *
 * @Route("/deck-builder")
 */
class DeckBuilderController
{
    /**
     * @var Factory
     */
    private $factory;

    /**
     * DeckBuilderController constructor.
     */
    public function __construct(Factory $factory)
    {
        $this->factory = $factory;
    }

    /**
     * Build a deck with all the cards from a clan that are not at max level
     *
     * @throws \Exception
     *
     * @Route("/create/{clanId}")
     */
    public function create(int $clanId)
    {
        $characterInCollectionIDs = [];

        $page = 0;

        do {
            $command = new Command('collections.getCollectionPage', [
                'clanID' => $clanId,
                'page' => $page++,
            ]);

            $this->factory->execute(new Request($command));

            $result = $command->getResult();
            $items = $result['items'];

            foreach ($items as $item) {
                if ($item['level'] < $item['level_max']) {
                    $characterInCollectionIDs[] = $item['id_player_character'];
                }
            }
        } while ($result['context']['hasNextPage']);

        \jp3cki\fisherYatesShuffle\shuffle($characterInCollectionIDs);

        $command = new Command('collections.setSelectionAsDeck', [
            'characterInCollectionIDs' => $characterInCollectionIDs
        ]);

        $this->factory->execute(new Request($command));

        $result = $command->getResult();
        dump($result);
        die;
    }
}