<?php

namespace Sdk\Result;

use Sdk\Model\Preset;

class GetPresetsResult extends AbstractResult
{
    /**
     * @var Preset[]
     */
    private $items;

    /**
     * GetPresetsResult constructor.
     * @param Preset[] $items
     */
    public function __construct(array $items)
    {
        $this->items = $items;
    }

    /**
     * @return Preset[]
     */
    public function getItems(): array
    {
        return $this->items;
    }
}