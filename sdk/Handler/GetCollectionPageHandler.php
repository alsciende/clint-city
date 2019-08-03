<?php

namespace Sdk\Handler;

use Api\Dto\Command;
use Sdk\Result\GetCollectionPageResult;

class GetCollectionPageHandler extends AbstractHandler
{
    const CLAN_ALL = 0;

    const GROUP_BY_ALL = 'all';
    const GROUP_BY_DOUBLE = 'double';
    const GROUP_BY_EVOLVE = 'evolve';
    const GROUP_BY_MAXED = 'maxed';
    const GROUP_BY_NODECK = 'nodeck';
    const GROUP_BY_BEST = 'best';

    public function handle(
        bool $deckOnly = false,
        int $page = 0,
        int $nbPerPage = 12,
        int $clanID = 0,
        string $groupBy = self::GROUP_BY_ALL
    ): GetCollectionPageResult {
        $command = new Command('collections.getCollectionPage', [
            'deckOnly'  => $deckOnly,
            'page'      => $page,
            'nbPerPage' => $nbPerPage,
            'clanID'    => $clanID,
            'groupBy'   => $groupBy,
        ]);

        return $this->convert($command, GetCollectionPageResult::class);
    }
}