<?php

namespace Sdk\Result;

use Sdk\Model\MissionProgress;

class GetMissionsResult extends AbstractResult
{
    /**
     * @var MissionProgress[]
     */
    private $items;

    /**
     * GetMissionsResult constructor.
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