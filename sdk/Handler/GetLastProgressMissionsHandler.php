<?php

namespace Sdk\Handler;

use Api\Dto\Command;
use Sdk\Result\GetLastProgressMissionsResult;

class GetLastProgressMissionsHandler extends AbstractHandler
{
    public function __invoke(int $nbMissions = 5): GetLastProgressMissionsResult
    {
        $command = new Command('missions.getLastProgressMissions', [
            'nbMissions' => $nbMissions
        ]);

        return $this->handle($command, GetLastProgressMissionsResult::class);
    }
}