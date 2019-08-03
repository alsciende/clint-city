<?php

namespace Sdk\Command;

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

    public function getResponse(): GetLastProgressMissionsResult
    {
        return $this->response;
    }
}