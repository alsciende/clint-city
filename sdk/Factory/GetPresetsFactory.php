<?php

namespace Sdk\Factory;

use Api\Dto\Command;
use Sdk\Command\GetPresetsCommand;
use Sdk\Result\GetPresetsResult;

class GetPresetsFactory
{
    static public function create(
        ?int $deckFormatID = null
    ) {
        return new GetPresetsCommand([
            'deckFormatID' => $deckFormatID,
        ]);
    }
}