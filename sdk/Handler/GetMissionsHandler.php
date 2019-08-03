<?php

namespace Sdk\Handler;

use Api\Dto\Command;
use Sdk\Result\GetMissionsResult;

class GetMissionsHandler extends AbstractHandler
{
    const GROUP_ALL = 'all';
    const GROUP_IN_PROGRESS = 'inprogress';
    const GROUP_COMPLETED = 'completed';

    public function __invoke(string $group = self::GROUP_ALL): GetMissionsResult
    {
        $command = new Command('missions.getMissions', [
            'group' => $group
        ]);

        return $this->handle($command, GetMissionsResult::class);
    }
}