<?php

namespace Sdk\Command;

use Sdk\Processor\ProcessorInterface;
use Sdk\Result\GetCharacterVariationsResult;

class GetCharacterVariationsCommand extends AbstractCommand
{
    static public function create(
        int $characterID
    ) {
        return new self([
            'characterID' => $characterID,
        ]);
    }

    static public function getCallName(): string
    {
        return 'collections.getCharacterVariations';
    }

    public function getResultClassName(): string
    {
        return GetCharacterVariationsResult::class;
    }

    public function getResult(): GetCharacterVariationsResult
    {
        return $this->result;
    }

    public function process(ProcessorInterface $processor): self
    {
        $processor->process($this);

        return $this;
    }
}