<?php

declare(strict_types=1);

namespace Sdk\Model;

class Preset
{
    /** @var int */
    private $id;

    /** @var string */
    private $name;

    /** @var string */
    private $deckValue;

    /** @var int */
    private $nbCards;

    /** @var bool */
    private $isCurrentDeck;

    /** @var CharacterInPreset[] */
    private $characters;

    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getDeckValue(): string
    {
        return $this->deckValue;
    }

    public function getNbCards(): int
    {
        return $this->nbCards;
    }

    public function isCurrentDeck(): bool
    {
        return $this->isCurrentDeck;
    }

    /**
     * @return CharacterInPreset[]
     */
    public function getCharacters(): array
    {
        return $this->characters;
    }
}
