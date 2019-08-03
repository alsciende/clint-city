<?php

namespace Sdk\Command;

use Api\Dto\Command;
use Sdk\Processor\ProcessorInterface;

abstract class AbstractCommand extends Command implements CommandInterface
{
    protected $result;

    public function setResult($result): self
    {
        $this->result = $result;

        return $this;
    }

    abstract static public function getCallName(): string;

    public function __construct(array $params = [], array $contextFilter = [], array $itemsFilter = [])
    {
        parent::__construct(static::getCallName(), $params, $contextFilter, $itemsFilter);
    }

    abstract public function process(ProcessorInterface $processor);
}