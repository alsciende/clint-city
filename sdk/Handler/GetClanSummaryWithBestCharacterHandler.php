<?php

namespace Sdk\Handler;

use Api\Dto\Command;
use Sdk\Result\GetClanSummaryResult;
use Sdk\Result\GetClanSummaryWithBestCharacterResult;

class GetClanSummaryWithBestCharacterHandler extends AbstractHandler
{
    public function handle(int $clanID = 0, bool $ownedOnly = false
    ): GetClanSummaryResult {
        $command = new Command('collections.getClanSummary', [
            'clanID'           => $clanID,
            'addBestCharacter' => true,
            'ownedOnly'        => $ownedOnly,
        ]);

        return $this->convert($command, GetClanSummaryWithBestCharacterResult::class);
    }
}