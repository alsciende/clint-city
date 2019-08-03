<?php

namespace Sdk\Model;

class CharacterWithDescription extends BaseCharacter
{
    /** @var string */
    protected $description;

    /** @var string */
    protected $abilityLongDescription;

    /** @var string */
    protected $bonusLongDescription;

    /** @var Mission[] */
    protected $missions;

    public function getDescription(): string
    {
        return $this->description;
    }

    public function getAbilityLongDescription(): string
    {
        return $this->abilityLongDescription;
    }

    public function getBonusLongDescription(): string
    {
        return $this->bonusLongDescription;
    }

    /**
     * @return Mission[]
     */
    public function getMissions(): array
    {
        return $this->missions;
    }
}