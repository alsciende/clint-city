<?php

namespace Sdk\Result;

use Sdk\Model\MissionProgress;

class GetLastProgressMissionsResult extends AbstractResult
{
    /**
     * @var MissionProgress[]
     */
    private $items;

    /**
     * GetLastProgressMissionsResult constructor.
     * @param MissionProgress[] $items
     */
    public function __construct(array $items)
    {
        $this->items = $items;
    }

    /**
     * @return MissionProgress[]
     */
    public function getItems(): array
    {
        return $this->items;
    }
}