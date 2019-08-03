<?php

namespace Sdk\Handler;

use Api\Dto\Command;
use Sdk\Result\GetCharacterVariationsResult;

class GetCharacterVariationsHandler extends AbstractHandler
{
    public function __invoke(int $characterID): GetCharacterVariationsResult
    {
        $command = new Command('collections.getCharacterVariations', [
            'characterID' => $characterID,
        ]);

        return $this->handle($command, GetCharacterVariationsResult::class);
    }
}