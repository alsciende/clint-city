<?php

namespace Sdk\Command;

use Sdk\Processor\ProcessorInterface;
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

    public function process(ProcessorInterface $processor): GetCollectionPageResult
    {
        $processor->process($this);

        return $this->result;
    }
}