<?php

declare(strict_types=1);

namespace Sdk\Model;

class CharacterInPreset
{
    /** @var int */
    private $id;

    /** @var int */
    private $idPlayer;

    /** @var int */
    private $idCharacter;

    /** @var int */
    private $xp;

    /** @var int */
    private $level;

    /** @var string */
    private $bourse;

    /** @var bool */
    private $inDeck;

    /** @var bool */
    private $justLeveledUp;

    /** @var bool */
    private $live;

    /** @var string */
    private $useShard;

    /** @var bool */
    private $usePlayer;

    /** @var bool */
    private $transactionInProgress;

    public function getId(): int
    {
        return $this->id;
    }

    public function getIdPlayer(): int
    {
        return $this->idPlayer;
    }

    public function getIdCharacter(): int
    {
        return $this->idCharacter;
    }

    public function getXp(): int
    {
        return $this->xp;
    }

    public function getLevel(): int
    {
        return $this->level;
    }

    public function getBourse(): string
    {
        return $this->bourse;
    }

    public function isInDeck(): bool
    {
        return $this->inDeck;
    }

    public function isJustLeveledUp(): bool
    {
        return $this->justLeveledUp;
    }

    public function isLive(): bool
    {
        return $this->live;
    }

    public function getUseShard(): string
    {
        return $this->useShard;
    }

    public function isUsePlayer(): bool
    {
        return $this->usePlayer;
    }

    public function isTransactionInProgress(): bool
    {
        return $this->transactionInProgress;
    }
}
