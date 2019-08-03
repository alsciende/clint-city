<?php

namespace Sdk\Factory;

use Api\Dto\Command;
use Sdk\Command\GetLastProgressMissionsCommand;
use Sdk\Result\GetLastProgressMissionsResult;

class GetLastProgressMissionsFactory
{
    static public function create(
        int $nbMissions = 5
    ) {
        return new GetLastProgressMissionsCommand([
            'nbMissions' => $nbMissions,
        ]);
    }
}