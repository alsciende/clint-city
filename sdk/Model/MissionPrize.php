<?php

namespace Sdk\Model;

class MissionPrize
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var int
     */
    private $idMissionPrizeCategory;

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $kindOfPrize;

    /**
     * @var int
     */
    private $idOrQuantity;

    /**
     * @var string
     */
    private $rarity;

    public function getId(): int
    {
        return $this->id;
    }

    public function getIdMissionPrizeCategory(): int
    {
        return $this->idMissionPrizeCategory;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getKindOfPrize(): string
    {
        return $this->kindOfPrize;
    }

    public function getIdOrQuantity(): int
    {
        return $this->idOrQuantity;
    }

    public function getRarity(): string
    {
        return $this->rarity;
    }
}