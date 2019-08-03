<?php

namespace Sdk\Model;

class MissionProgress
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var int
     */
    private $quantity;

    /**
     * @var int
     */
    private $previousQuantity;

    /**
     * @var int
     */
    private $progressSinceLastUpdate;

    /**
     * @var int
     */
    private $previousPercentage;

    /**
     * @var int
     */
    private $percentage;

    /**
     * @var bool
     */
    private $isNew;

    /**
     * @var bool
     */
    private $isDone;

    /**
     * @var int
     */
    private $dateUpdate;

    /**
     * @var int
     */
    private $lastUpdateBattleID;

    /**
     * @var MissionPrize
     */
    private $missionPrize;

    /**
     * @var Mission
     */
    private $mission;

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