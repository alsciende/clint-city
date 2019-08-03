<?php

namespace Sdk\Command;

use Sdk\Result\GetClanSummaryWithBestCharacterResult;

class GetClanSummaryWithBestCharacterCommand extends AbstractCommand
{
    static public function getCallName(): string
    {
        return 'collections.getClanSummary';
    }

    public function getClassName(): string
    {
        return GetClanSummaryWithBestCharacterResult::class;
    }

    public function getResponse(): GetClanSummaryWithBestCharacterResult
    {
        return $this->response;
    }
}