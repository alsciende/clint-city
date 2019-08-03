<?php

namespace Sdk\Command;

use Sdk\Processor\ProcessorInterface;
use Sdk\Result\GetCharactersResult;

class GetCharactersCommand extends AbstractCommand
{
    static public function getCallName(): string
    {
        return 'characters.getCharacters';
    }

    public function getClassName(): string
    {
        return GetCharactersResult::class;
    }

    public function getResult(): GetCharactersResult
    {
        return $this->result;
    }

    public function process(ProcessorInterface $processor): self
    {
        $processor->process($this);

        return $this;
    }
}