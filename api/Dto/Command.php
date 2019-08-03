<?php

declare(strict_types=1);

namespace Api\Dto;

/**
 * Data class for a generic command understood by the API.
 *
 * The command holds both the data of one call and the data of its result.
 */
class Command implements CommandInterface
{
    /**
     * @var string
     */
    private $call;

    /**
     * @var array
     */
    private $params;

    /**
     * @var array
     */
    private $contextFilter;

    /**
     * @var array
     */
    private $itemsFilter;

    /**
     * @var array
     */
    private $result;

    /**
     * Command constructor.
     *
     * @param string $call
     * @param array  $params
     * @param array  $contextFilter
     * @param array  $itemsFilter
     */
    public function __construct(string $call, array $params = [], array $contextFilter = [], array $itemsFilter = [])
    {
        $this->call = $call;
        $this->params = $params;
        $this->contextFilter = $contextFilter;
        $this->itemsFilter = $itemsFilter;
    }

    /**
     * @return string
     */
    public function getCall(): string
    {
        return $this->call;
    }

    /**
     * @return array
     */
    public function getParams(): array
    {
        return $this->params;
    }

    /**
     * @return array
     */
    public function getContextFilter(): array
    {
        return $this->contextFilter;
    }

    /**
     * @param array $contextFilter
     */
    public function setContextFilter(array $contextFilter): void
    {
        $this->contextFilter = $contextFilter;
    }

    /**
     * @return array
     */
    public function getItemsFilter(): array
    {
        return $this->itemsFilter;
    }

    /**
     * @param array $itemsFilter
     */
    public function setItemsFilter(array $itemsFilter): void
    {
        $this->itemsFilter = $itemsFilter;
    }

    /**
     * {@inheritdoc}
     */
    public function jsonSerialize()
    {
        return [
            'call' => $this->call,
            'params' => $this->params,
            'contextFilter' => $this->contextFilter,
            'itemsFilter' => $this->itemsFilter,
        ];
    }

    /**
     * @return array
     */
    public function getResult(): array
    {
        return $this->result;
    }

    /**
     * @param array $result
     */
    public function setResult(array $result): void
    {
        $this->result = $result;
    }
}
