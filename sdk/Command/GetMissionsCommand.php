<?php

namespace Sdk\Command;

use Sdk\Processor\ProcessorInterface;
use Sdk\Result\GetMissionsResult;

class GetMissionsCommand extends AbstractCommand
{
    static public function getCallName(): string
    {
        return 'missions.getMissions';
    }

    public function getResultClassName(): string
    {
        return GetMissionsResult::class;
    }

    public function getResult(): GetMissionsResult
    {
        return $this->result;
    }

    public function process(ProcessorInterface $processor): self
    {
        $processor->process($this);

        return $this;
    }
}