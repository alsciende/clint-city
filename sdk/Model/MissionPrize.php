<?php

namespace Sdk\Model;

class MissionPrize
{
    private string $type;
    // type = player_xp | clintz | credits | cryptocoinz
    private ?int $value;
    // type = card
    private ?int $idPerso;
    private ?int $idPlayerCharacter;
    private array $character;
}