<?php

declare(strict_types=1);

namespace Sdk\Model;

class CharacterWithVariation extends BaseCharacter implements CharacterVariationInterface
{
    use CharacterVariationTrait;
}
