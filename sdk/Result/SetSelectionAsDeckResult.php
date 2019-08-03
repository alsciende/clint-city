<?php

namespace Sdk\Result;

class SetSelectionAsDeckResult extends AbstractResult
{
    /**
     * @var array
     */
    private $items;

    /**
     * SetSelectionAsDeckResult constructor.
     * @param array $items
     */
    public function __construct(array $items)
    {
        $this->items = $items;
    }

    /**
     * @return array
     */
    public function getItems(): array
    {
        return $this->items;
    }
}