<?php

namespace Sdk\Command;

use Sdk\Result\GetMissionsResult;

class GetMissionsCommand extends AbstractCommand
{
    static public function getCallName(): string
    {
        return 'missions.getMissions';
    }

    public function getClassName(): string
    {
        return GetMissionsResult::class;
    }

    public function getResponse(): GetMissionsResult
    {
        return $this->response;
    }
}