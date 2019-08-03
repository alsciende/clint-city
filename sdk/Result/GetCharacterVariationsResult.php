<?php

namespace Sdk\Result;

use Sdk\Model\CharacterWithVariation;

class GetCharacterVariationsResult extends AbstractResult
{
    /**
     * @var CharacterWithVariation[]
     */
    private $items;

    /**
     * GetCharacterVariationsResult constructor.
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