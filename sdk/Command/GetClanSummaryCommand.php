<?php

namespace Sdk\Command;

use Sdk\Result\GetClanSummaryResult;

class GetClanSummaryCommand extends AbstractCommand
{
    static public function getCallName(): string
    {
        return 'collections.getClanSummary';
    }

    public function getClassName(): string
    {
        return GetClanSummaryResult::class;
    }

    public function getResponse(): GetClanSummaryResult
    {
        return $this->response;
    }
}