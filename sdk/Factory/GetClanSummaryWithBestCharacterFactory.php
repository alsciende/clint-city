<?php

namespace Sdk\Factory;

use Sdk\Command\GetClanSummaryWithBestCharacterCommand;

class GetClanSummaryWithBestCharacterFactory
{
    static public function create(
        int $clanID = 0,
        bool $ownedOnly = false
    ) {
        return new GetClanSummaryWithBestCharacterCommand([
            'clanID'           => $clanID,
            'addBestCharacter' => true,
            'ownedOnly'        => $ownedOnly,
        ]);
    }
}