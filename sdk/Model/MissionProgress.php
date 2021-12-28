<?php

namespace Sdk\Model;

class MissionProgress
{
    private int $id;
    private int $quantity;
    private int $previousQuantity;
    private int $progressSinceLastUpdate;
    private int $previousPercentage;
    private int $percentage;
    private bool $isNew;
    private bool $isDone;
    private int $dateUpdate;
    private int $lastUpdateBattleID;
    /** @var MissionPrize[] $missionPrize */
    private array $missionPrize;
    private array $mission;

    public function getId(): int
    {
        return $this->id;
    }

    public function getQuantity(): int
    {
        return $this->quantity;
    }

    public function getPreviousQuantity(): int
    {
        return $this->previousQuantity;
    }

    public function getProgressSinceLastUpdate(): int
    {
        return $this->progressSinceLastUpdate;
    }

    public function getPreviousPercentage(): int
    {
        return $this->previousPercentage;
    }

    public function getPercentage(): int
    {
        return $this->percentage;
    }

    public function getIsNew(): bool
    {
        return $this->isNew;
    }

    public function getIsDone(): bool
    {
        return $this->isDone;
    }

    public function getDateUpdate(): int
    {
        return $this->dateUpdate;
    }

    public function getLastUpdateBattleID(): int
    {
        return $this->lastUpdateBattleID;
    }

    public function getMissionPrize(): MissionPrize
    {
        return $this->missionPrize;
    }

    public function getMission(): Mission
    {
        return $this->mission;
    }
}