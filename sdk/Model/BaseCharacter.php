<?php

declare(strict_types=1);

namespace Sdk\Model;

class BaseCharacter
{
    /** @var int */
    protected $id;

    /** @var string */
    protected $name;

    /** @var string */
    protected $url;

    /** @var int */
    protected $clanId;

    /** @var string */
    protected $clanName;

    /** @var int */
    protected $level;

    /** @var int */
    protected $xpForLevel;

    /** @var int */
    protected $levelMin;

    /** @var int */
    protected $levelMax;

    /** @var int */
    protected $power;

    /** @var int */
    protected $damage;

    /** @var string */
    protected $rarity;

    /** @var int */
    protected $abilityId;

    /** @var string */
    protected $ability;

    /** @var int */
    protected $abilityUnlockLevel;

    /** @var string */
    protected $bonus;

    /** @var bool */
    protected $hasNightBonus;

    /** @var int */
    protected $bankPrice;

    /** @var bool */
    protected $distrib;

    /** @var string */
    protected $kind;

    /** @var int */
    protected $offerAtLevel;

    /** @var int */
    protected $isTradable;

    /** @var int */
    protected $releaseDate;

    /** @var bool */
    protected $efcBanned;

    /** @var bool */
    protected $tourneyBanned;

    /** @var bool */
    protected $tourneyT1Banned;

    /** @var bool */
    protected $tourneyT2Banned;

    /** @var int */
    protected $penalty;

    /** @var string */
    protected $altEvoPictureParam;

    /** @var string */
    protected $characterPictUrl;

    /** @var string */
    protected $characterNewPictUrl;

    /** @var string */
    protected $clanPictUrl;

    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getUrl(): string
    {
        return $this->url;
    }

    public function getClanId(): int
    {
        return $this->clanId;
    }

    public function getClanName(): string
    {
        return $this->clanName;
    }

    public function getLevel(): int
    {
        return $this->level;
    }

    public function getXpForLevel(): int
    {
        return $this->xpForLevel;
    }

    public function getLevelMin(): int
    {
        return $this->levelMin;
    }

    public function getLevelMax(): int
    {
        return $this->levelMax;
    }

    public function getPower(): int
    {
        return $this->power;
    }

    public function getDamage(): int
    {
        return $this->damage;
    }

    public function getRarity(): string
    {
        return $this->rarity;
    }

    public function getAbilityId(): int
    {
        return $this->abilityId;
    }

    public function getAbility(): string
    {
        return $this->ability;
    }

    public function getAbilityUnlockLevel(): int
    {
        return $this->abilityUnlockLevel;
    }

    public function getBonus(): string
    {
        return $this->bonus;
    }

    public function isHasNightBonus(): bool
    {
        return $this->hasNightBonus;
    }

    public function getBankPrice(): int
    {
        return $this->bankPrice;
    }

    public function isDistrib(): bool
    {
        return $this->distrib;
    }

    public function getKind(): string
    {
        return $this->kind;
    }

    public function getOfferAtLevel(): int
    {
        return $this->offerAtLevel;
    }

    public function getisTradable(): int
    {
        return $this->isTradable;
    }

    public function getReleaseDate(): int
    {
        return $this->releaseDate;
    }

    public function isEfcBanned(): bool
    {
        return $this->efcBanned;
    }

    public function isTourneyBanned(): bool
    {
        return $this->tourneyBanned;
    }

    public function isTourneyT1Banned(): bool
    {
        return $this->tourneyT1Banned;
    }

    public function isTourneyT2Banned(): bool
    {
        return $this->tourneyT2Banned;
    }

    public function getPenalty(): int
    {
        return $this->penalty;
    }

    public function getAltEvoPictureParam(): string
    {
        return $this->altEvoPictureParam;
    }

    public function getCharacterPictUrl(): string
    {
        return $this->characterPictUrl;
    }

    public function getCharacterNewPictUrl(): string
    {
        return $this->characterNewPictUrl;
    }

    public function getClanPictUrl(): string
    {
        return $this->clanPictUrl;
    }
}
