<?php

namespace Sdk\Factory;

use Sdk\Command\GetClanSummaryCommand;

class GetClanSummaryFactory
{
    static public function create(
        int $clanID = 0,
        bool $ownedOnly = false
    ) {
        return new GetClanSummaryCommand([
            'clanID'           => $clanID,
            'addBestCharacter' => false,
            'ownedOnly'        => $ownedOnly,
        ]);
    }
}