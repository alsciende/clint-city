<?php

namespace Sdk\Command;

use Sdk\Result\GetPresetsResult;

class GetPresetsCommand extends AbstractCommand
{
    static public function getCallName(): string
    {
        return 'collections.getPresets';
    }

    public function getClassName(): string
    {
        return GetPresetsResult::class;
    }

    public function getResponse(): GetPresetsResult
    {
        return $this->response;
    }
}