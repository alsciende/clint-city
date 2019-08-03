<?php

namespace Sdk\Command;

use Sdk\Processor\ProcessorInterface;
use Sdk\Result\GetLastProgressMissionsResult;

class GetLastProgressMissionsCommand extends AbstractCommand
{
    static public function getCallName(): string
    {
        return 'missions.getLastProgressMissions';
    }

    public function getClassName(): string
    {
        return GetLastProgressMissionsResult::class;
    }

    public function getResult(): GetLastProgressMissionsResult
    {
        return $this->result;
    }

    public function process(ProcessorInterface $processor): GetLastProgressMissionsResult
    {
        $processor->process($this);

        return $this->result;
    }
}