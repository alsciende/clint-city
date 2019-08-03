<?php

namespace Sdk\Command;

use Sdk\Processor\ProcessorInterface;
use Sdk\Result\GetClanSummaryWithBestCharacterResult;

class GetClanSummaryWithBestCharacterCommand extends AbstractCommand
{
    static public function create(
        int $clanID = 0,
        bool $ownedOnly = false
    ) {
        return new self([
            'clanID'           => $clanID,
            'addBestCharacter' => true,
            'ownedOnly'        => $ownedOnly,
        ]);
    }

    static public function getCallName(): string
    {
        return 'collections.getClanSummary';
    }

    public function getResultClassName(): string
    {
        return GetClanSummaryWithBestCharacterResult::class;
    }

    public function getResult(): GetClanSummaryWithBestCharacterResult
    {
        return $this->result;
    }

    public function process(ProcessorInterface $processor): self
    {
        $processor->process($this);

        return $this;
    }
}