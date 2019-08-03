<?php

namespace Sdk\Result;

use Sdk\Model\CharacterWithVariation;

class GetCollectionPageResult extends AbstractResult
{
    /**
     * @var CharacterWithVariation[]
     */
    private $items;

    /**
     * GetCollectionPageResult constructor.
     * @param CharacterWithVariation[] $items
     */
    public function __construct(array $items)
    {
        $this->items = $items;
    }

    /**
     * @return CharacterWithVariation[]
     */
    public function getItems(): array
    {
        return $this->items;
    }
}