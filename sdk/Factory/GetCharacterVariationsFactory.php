<?php

namespace Sdk\Factory;

use Sdk\Command\GetCharacterVariationsCommand;

class GetCharacterVariationsFactory
{
    static public function create(
        int $characterID
    ) {
        return new GetCharacterVariationsCommand([
            'characterID' => $characterID,
        ]);
    }
}