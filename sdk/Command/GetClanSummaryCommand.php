<?php

namespace Sdk\Command;

use Sdk\Processor\ProcessorInterface;
use Sdk\Result\GetClanSummaryResult;

class GetClanSummaryCommand extends AbstractCommand
{
    static public function create(
        int $clanID = 0,
        bool $ownedOnly = false
    ) {
        return new self([
            'clanID'           => $clanID,
            'addBestCharacter' => false,
            'ownedOnly'        => $ownedOnly,
        ]);
    }

    static public function getCallName(): string
    {
        return 'collections.getClanSummary';
    }

    public function getResultClassName(): string
    {
        return GetClanSummaryResult::class;
    }

    public function getResult(): GetClanSummaryResult
    {
        return $this->result;
    }

    public function process(ProcessorInterface $processor): self
    {
        $processor->process($this);

        return $this;
    }
}