<?php

namespace Sdk\Command;

use Api\Dto\Command;

abstract class AbstractCommand extends Command implements CommandInterface
{
    protected $response;

    public function setResponse($response): self
    {
        $this->response = $response;

        return $this;
    }

    abstract static public function getCallName(): string;

    public function __construct(array $params = [], array $contextFilter = [], array $itemsFilter = [])
    {
        parent::__construct(static::getCallName(), $params, $contextFilter, $itemsFilter);
    }
}