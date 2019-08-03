<?php

namespace Sdk\Handler;

use Api\Dto\Command;
use Sdk\Result\GetCharacterVariationsResult;

class GetCharacterVariationsHandler extends AbstractHandler
{
    public function handle(int $characterID): GetCharacterVariationsResult
    {
        $command = new Command('collections.getCharacterVariations', [
            'characterID' => $characterID,
        ]);

        return $this->convert($command, GetCharacterVariationsResult::class);
    }
}