<?php

namespace Sdk\Command;

use Sdk\Result\GetCollectionPageResult;

class GetCollectionPageCommand extends AbstractCommand
{
    static public function getCallName(): string
    {
        return 'collections.getCollectionPage';
    }

    public function getClassName(): string
    {
        return GetCollectionPageResult::class;
    }

    public function getResponse(): GetCollectionPageResult
    {
        return $this->result;
    }
}