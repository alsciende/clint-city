<?php

declare(strict_types=1);

namespace Sdk\Model;

class BaseCharacter
{
    protected int $id;
    protected string $name;
    protected string $url;
    protected int $clanId;
    protected string $clanName;
    protected int $level;
    protected int $xpForLevel;
    protected int $levelMin;
    protected int $levelMax;
    protected int $power;
    protected int $damage;
    protected string $rarity;
    protected int $abilityId;
    protected string $ability;
    protected int $abilityUnlockLevel;
    protected string $bonus;
    protected bool $hasNightBonus;
    protected int $bankPrice;
    protected bool $distrib;
    protected string $kind;
    protected int $offerAtLevel;
    protected int $isTradable;
    protected int $releaseDate;
    protected bool $efcBanned;
    protected bool $tourneyBanned;
    protected bool $tourneyT1Banned;
    protected bool $tourneyT2Banned;
    protected int $penalty;
    protected string $altEvoPictureParam;
    protected string $characterPictUrl;
    protected string $characterNewPictUrl;
    protected string $clanPictUrl;
    protected int $bankBattlepoints;
    protected bool $efcTempBanned;
    protected bool $efcBonusLow;
    protected bool $efcBonusHigh;
    protected string $collectorDate;
    protected string $mythicDate;

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

    public function getBankBattlepoints(): int
    {
        return $this->bankBattlepoints;
    }

    public function isEfcTempBanned(): bool
    {
        return $this->efcTempBanned;
    }

    public function isEfcBonusLow(): bool
    {
        return $this->efcBonusLow;
    }

    public function isEfcBonusHigh(): bool
    {
        return $this->efcBonusHigh;
    }

    public function getCollectorDate(): string
    {
        return $this->collectorDate;
    }

    public function getMythicDate(): string
    {
        return $this->mythicDate;
    }
}
