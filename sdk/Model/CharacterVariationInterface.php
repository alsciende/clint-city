<?php

declare(strict_types=1);

namespace Sdk\Model;

interface CharacterVariationInterface
{
    public function getIdPlayerCharacter(): int;

    public function getIdPlayer(): int;

    public function getXp(): int;

    public function getIdMarket(): string;

    public function isInDeck(): bool;
}
