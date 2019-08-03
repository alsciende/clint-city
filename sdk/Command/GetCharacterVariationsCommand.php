<?php

namespace Sdk\Command;

use Sdk\Processor\ProcessorInterface;
use Sdk\Result\GetCharacterVariationsResult;

class GetCharacterVariationsCommand extends AbstractCommand
{
    static public function getCallName(): string
    {
        return 'collections.getCharacterVariations';
    }

    public function getClassName(): string
    {
        return GetCharacterVariationsResult::class;
    }

    public function getResult(): GetCharacterVariationsResult
    {
        return $this->result;
    }

    public function process(ProcessorInterface $processor): GetCharacterVariationsResult
    {
        $processor->process($this);

        return $this->result;
    }
}