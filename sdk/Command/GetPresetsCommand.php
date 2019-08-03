<?php

namespace Sdk\Command;

use Sdk\Processor\ProcessorInterface;
use Sdk\Result\GetPresetsResult;

class GetPresetsCommand extends AbstractCommand
{
    static public function getCallName(): string
    {
        return 'collections.getPresets';
    }

    public function getResultClassName(): string
    {
        return GetPresetsResult::class;
    }

    public function getResult(): GetPresetsResult
    {
        return $this->result;
    }

    public function process(ProcessorInterface $processor): self
    {
        $processor->process($this);

        return $this;
    }
}