<?php

namespace Sdk\Command;

use Sdk\Processor\ProcessorInterface;
use Sdk\Result\GetLastProgressMissionsResult;

class GetLastProgressMissionsCommand extends AbstractCommand
{
    static public function create(
        int $nbMissions = 5
    ) {
        return new self([
            'nbMissions' => $nbMissions,
        ]);
    }

    static public function getCallName(): string
    {
        return 'missions.getLastProgressMissions';
    }

    public function getResultClassName(): string
    {
        return GetLastProgressMissionsResult::class;
    }

    public function getResult(): GetLastProgressMissionsResult
    {
        return $this->result;
    }

    public function process(ProcessorInterface $processor): self
    {
        $processor->process($this);

        return $this;
    }
}