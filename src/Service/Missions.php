<?php

declare(strict_types=1);

namespace App\Service;

use Api\Client\SingleCommandClient;
use Api\Dto\Command;
use Sdk\Model\MissionProgress;

class Missions
{
    const GROUP_ALL = 'all';
    const GROUP_IN_PROGRESS = 'inprogress';
    const GROUP_COMPLETED = 'completed';

    /**
     * @var SingleCommandClient
     */
    private $client;

    public function __construct(SingleCommandClient $client)
    {
        $this->client = $client;
    }

    /**
     * @return array
     */
    public function getMissions(string $group = self::GROUP_ALL): array
    {
        $items = $this->client->executeCommand(new Command('missions.getMissions', [
            'group' => $group
        ]));

        return $this->client->denormalizeArray($items, MissionProgress::class);
    }

    public function getLastProgressMissions(int $nbMissions = 5): array
    {
        $items = $this->client->executeCommand(new Command('missions.getLastProgressMissions', [
            'nbMissions' => $nbMissions
        ]));

        return $this->client->denormalizeArray($items, MissionProgress::class);
    }
}
