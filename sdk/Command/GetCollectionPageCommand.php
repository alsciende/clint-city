<?php

namespace Sdk\Command;

use Sdk\Processor\ProcessorInterface;
use Sdk\Result\GetCollectionPageResult;

class GetCollectionPageCommand extends AbstractCommand
{
    const CLAN_ALL = 0;

    const GROUP_BY_ALL = 'all';
    const GROUP_BY_DOUBLE = 'double';
    const GROUP_BY_EVOLVE = 'evolve';
    const GROUP_BY_MAXED = 'maxed';
    const GROUP_BY_NODECK = 'nodeck';
    const GROUP_BY_BEST = 'best';

    static public function create(
        bool $deckOnly = false,
        int $page = 0,
        int $nbPerPage = 12,
        int $clanID = 0,
        string $groupBy = self::GROUP_BY_ALL
    ) {
        return new self([
            'deckOnly'  => $deckOnly,
            'page'      => $page,
            'nbPerPage' => $nbPerPage,
            'clanID'    => $clanID,
            'groupBy'   => $groupBy,
        ]);
    }

    static public function getCallName(): string
    {
        return 'collections.getCollectionPage';
    }

    public function getResultClassName(): string
    {
        return GetCollectionPageResult::class;
    }

    public function getResult(): GetCollectionPageResult
    {
        return $this->result;
    }

    public function process(ProcessorInterface $processor): self
    {
        $processor->process($this);

        return $this;
    }
}