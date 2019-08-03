<?php

declare(strict_types=1);

namespace Sdk\Model;

class CharacterWithDescriptionAndSummaryAndVariation extends CharacterWithDescriptionAndSummary implements CharacterVariationInterface
{
    use CharacterVariationTrait;
}
