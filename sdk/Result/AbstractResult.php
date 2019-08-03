<?php

namespace Sdk\Result;

abstract class AbstractResult implements ResultInterface
{
    /**
     * @var array
     */
    private $context;

    public function getContext(): array
    {
        return $this->context;
    }

    public function setContext(array $context): self
    {
        $this->context = $context;

        return $this;
    }

    abstract public function getItems(): ?array;
}