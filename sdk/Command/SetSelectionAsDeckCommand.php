<?php

namespace Sdk\Command;

use Sdk\Processor\ProcessorInterface;
use Sdk\Result\SetSelectionAsDeckResult;

class SetSelectionAsDeckCommand extends AbstractCommand
{
    static public function getCallName(): string
    {
        return 'collections.setSelectionAsDeck';
    }

    public function getClassName(): string
    {
        return SetSelectionAsDeckResult::class;
    }

    public function getResult(): SetSelectionAsDeckResult
    {
        return $this->result;
    }

    public function process(ProcessorInterface $processor): self
    {
        $processor->process($this);

        return $this;
    }
}