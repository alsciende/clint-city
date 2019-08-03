<?php

namespace Sdk\Result;

use Sdk\Model\CharacterWithDescriptionAndSummary;

class GetClanSummaryResult extends AbstractResult
{
    /**
     * @var CharacterWithDescriptionAndSummary[]
     */
    private $items;

    /**
     * GetClanSummaryResult constructor.
     * @param CharacterWithDescriptionAndSummary[] $items
     */
    public function __construct(array $items)
    {
        $this->items = $items;
    }

    /**
     * @return CharacterWithDescriptionAndSummary[]
     */
    public function getItems(): array
    {
        return $this->items;
    }
}