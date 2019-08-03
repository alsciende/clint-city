<?php

namespace Sdk\Result;

use Sdk\Model\CharacterWithDescription;

class GetCharactersResult extends AbstractResult
{
    /**
     * @var CharacterWithDescription[]
     */
    private $items;

    /**
     * GetCharactersResult constructor.
     * @param CharacterWithDescription[] $items
     */
    public function __construct(array $items)
    {
        $this->items = $items;
    }

    /**
     * @return CharacterWithDescription[]
     */
    public function getItems(): array
    {
        return $this->items;
    }
}