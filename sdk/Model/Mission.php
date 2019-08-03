<?php

namespace Sdk\Model;

class Mission
{
    /** @var int */
    private $id;

    /** @var string */
    private $internalName;

    /** @var string */
    private $name;

    /** @var string */
    private $description;

    /** @var int */
    private $iconID;

    /** @var string */
    private $iconName;

    /** @var string */
    private $iconURL;

    /** @var int */
    private $points;

    /** @var int */
    private $quantity;

    /** @var int */
    private $missionTypeID;

    /** @var int */
    private $missionPrizeCategoryID;

    /** @var string */
    private $missionPrizeCategoryIconURL;

    /** @var string */
    private $missionPrizeCategoryIconName;

    /** @var bool */
    private $isVisible;

    /** @var bool */
    private $isVisibleAllTheWay;

    /** @var bool */
    private $isAvailable;

    /** @var int */
    private $battleRuleID;

    /** @var int[] */
    private $missionBeforeIDs;

    /** @var int[] */
    private $soloLevelsRequiredIDs;

    /** @var int[] */
    private $soloLevelsPackRequiredIDs;

    /** @var int[] */
    private $arcadePathsRequiredIDs;

    /** @var int[] */
    private $tutorialsRequiredIDs;

    /** @var int[] */
    private $EFCZoneRequiredIDs;

    /** @var int[] */
    private $collectionYearsRequiredIDs;

    /** @var int[] */
    private $opponentsRequiredIDs;

    /** @var int[] */
    private $clansRequiredIDs;

    /** @var int[] */
    private $charactersRequiredIDs;

    /** @var int[] */
    private $abilitiesRequiredIDs;

    /** @var int */
    private $categoryID;

    /** @var int */
    private $minLevel;

    /** @var string */
    private $valueToReach;

    /** @var bool */
    private $isNightOnly;

    /** @var int */
    private $doneByPlayer;

    public function getId(): int
    {
        return $this->id;
    }

    public function getInternalName(): string
    {
        return $this->internalName;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function getIconID(): int
    {
        return $this->iconID;
    }

    public function getIconName(): string
    {
        return $this->iconName;
    }

    public function getIconURL(): string
    {
        return $this->iconURL;
    }

    public function getPoints(): int
    {
        return $this->points;
    }

    public function getQuantity(): int
    {
        return $this->quantity;
    }

    public function getMissionTypeID(): int
    {
        return $this->missionTypeID;
    }

    public function getMissionPrizeCategoryID(): int
    {
        return $this->missionPrizeCategoryID;
    }

    public function getMissionPrizeCategoryIconURL(): string
    {
        return $this->missionPrizeCategoryIconURL;
    }

    public function getMissionPrizeCategoryIconName(): string
    {
        return $this->missionPrizeCategoryIconName;
    }

    public function isVisible(): bool
    {
        return $this->isVisible;
    }

    public function isVisibleAllTheWay(): bool
    {
        return $this->isVisibleAllTheWay;
    }

    public function isAvailable(): bool
    {
        return $this->isAvailable;
    }

    public function getBattleRuleID(): int
    {
        return $this->battleRuleID;
    }

    public function getMissionBeforeIDs(): array
    {
        return $this->missionBeforeIDs;
    }

    public function getSoloLevelsRequiredIDs(): array
    {
        return $this->soloLevelsRequiredIDs;
    }

    public function getSoloLevelsPackRequiredIDs(): array
    {
        return $this->soloLevelsPackRequiredIDs;
    }

    public function getArcadePathsRequiredIDs(): array
    {
        return $this->arcadePathsRequiredIDs;
    }

    public function getTutorialsRequiredIDs(): array
    {
        return $this->tutorialsRequiredIDs;
    }

    public function getEFCZoneRequiredIDs(): array
    {
        return $this->EFCZoneRequiredIDs;
    }

    public function getCollectionYearsRequiredIDs(): array
    {
        return $this->collectionYearsRequiredIDs;
    }

    public function getOpponentsRequiredIDs(): array
    {
        return $this->opponentsRequiredIDs;
    }

    public function getClansRequiredIDs(): array
    {
        return $this->clansRequiredIDs;
    }

    public function getCharactersRequiredIDs(): array
    {
        return $this->charactersRequiredIDs;
    }

    public function getAbilitiesRequiredIDs(): array
    {
        return $this->abilitiesRequiredIDs;
    }

    public function getCategoryID(): int
    {
        return $this->categoryID;
    }

    public function getMinLevel(): int
    {
        return $this->minLevel;
    }

    public function getValueToReach(): string
    {
        return $this->valueToReach;
    }

    public function isNightOnly(): bool
    {
        return $this->isNightOnly;
    }

    public function getDoneByPlayer(): int
    {
        return $this->doneByPlayer;
    }
}