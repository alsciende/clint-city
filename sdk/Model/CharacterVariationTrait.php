<?php

declare(strict_types=1);

namespace Sdk\Model;

trait CharacterVariationTrait
{
    /** @var int */
    protected $idPlayerCharacter;

    /** @var int */
    protected $idPlayer;

    /** @var int */
    protected $xp;

    /** @var string */
    protected $idMarket;

    /** @var bool */
    protected $inDeck;

    public function getIdPlayerCharacter(): int
    {
        return $this->idPlayerCharacter;
    }

    public function getIdPlayer(): int
    {
        return $this->idPlayer;
    }

    public function getXp(): int
    {
        return $this->xp;
    }

    public function getIdMarket(): string
    {
        return $this->idMarket;
    }

    public function isInDeck(): bool
    {
        return $this->inDeck;
    }
}
