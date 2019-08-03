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

    public function getResultClassName(): string
    {
        return GetCollectionPageResult::class;
    }

    public function getResult(): GetCollectionPageResult
    {
        return $this->result;
    }

    public function process(ProcessorInterface $processor): self
    {
        $processor->process($this);

        return $this;
    }
}