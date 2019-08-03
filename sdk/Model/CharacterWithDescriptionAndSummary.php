<?php

declare(strict_types=1);

namespace Sdk\Model;

class CharacterWithDescriptionAndSummary extends CharacterWithDescription
{

    /** @var int */
    protected $totalOwnedCharacters;

    /** @var int */
    protected $totalClanCharacters;

    /** @var int */
    protected $minMarketPrice;

    /** @var int */
    protected $estimatedPrice;

    public function getTotalOwnedCharacters(): int
    {
        return $this->totalOwnedCharacters;
    }

    public function getTotalClanCharacters(): int
    {
        return $this->totalClanCharacters;
    }

    public function getMinMarketPrice(): int
    {
        return $this->minMarketPrice;
    }

    public function getEstimatedPrice(): int
    {
        return $this->estimatedPrice;
    }
}
