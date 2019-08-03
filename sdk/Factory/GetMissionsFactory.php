<?php

namespace Sdk\Factory;

use Api\Dto\Command;
use Sdk\Command\GetMissionsCommand;
use Sdk\Result\GetMissionsResult;

class GetMissionsFactory
{
    const GROUP_ALL = 'all';
    const GROUP_IN_PROGRESS = 'inprogress';
    const GROUP_COMPLETED = 'completed';

    static public function create(
        string $group = self::GROUP_ALL
    ) {
        return new GetMissionsCommand([
            'group' => $group,
        ]);
    }
}