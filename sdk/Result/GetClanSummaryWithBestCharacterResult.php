<?php

namespace Sdk\Result;

use Sdk\Model\CharacterWithDescriptionAndSummaryAndVariation;

class GetClanSummaryWithBestCharacterResult extends AbstractResult
{
    /**
     * @var CharacterWithDescriptionAndSummaryAndVariation[]
     */
    private $items;

    /**
     * GetClanSummaryResult constructor.
     * @param CharacterWithDescriptionAndSummaryAndVariation[] $items
     */
    public function __construct(array $items)
    {
        $this->items = $items;
    }

    /**
     * @return CharacterWithDescriptionAndSummaryAndVariation[]
     */
    public function getItems(): array
    {
        return $this->items;
    }
}