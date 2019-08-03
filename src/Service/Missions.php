<?php

declare(strict_types=1);

namespace App\Service;

use Sdk\Api\Client;
use Sdk\Api\Command;
use Sdk\Model\CharacterWithDescriptionAndSummary;
use Sdk\Model\CharacterWithDescriptionAndSummaryAndVariation;
use Sdk\Model\CharacterWithVariation;
use Sdk\Model\MissionProgress;
use Sdk\Model\Preset;

class Missions
{
    const GROUP_ALL = 'all';
    const GROUP_IN_PROGRESS = 'inprogress';
    const GROUP_COMPLETED = 'completed';

    /**
     * @var Client
     */
    private $client;

    public function __construct(Client $client)
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
