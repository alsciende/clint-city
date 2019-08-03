<?php

declare(strict_types=1);

namespace Sdk\Message;

use Sdk\Api\Command;

class GetCharacterVariationsQuery implements MessageInterface
{
    /**
     * @var int
     */
    private $characterID;

    /**
     * GetCharacterVariations constructor.
     * @param int $characterID
     */
    public function __construct(int $characterID)
    {
        $this->characterID = $characterID;
    }

    public function getCommand(): Command
    {
        return new Command('collections.getCharacterVariations', [
            'characterID' => $this->characterID,
        ]);
    }
}