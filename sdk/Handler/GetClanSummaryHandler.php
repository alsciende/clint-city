<?php

namespace Sdk\Handler;

use Api\Dto\Command;
use Sdk\Result\GetClanSummaryResult;

class GetClanSummaryHandler extends AbstractHandler
{
    public function handle(int $clanID = 0, bool $ownedOnly = false
    ): GetClanSummaryResult {
        $command = new Command('collections.getClanSummary', [
            'clanID'           => $clanID,
            'addBestCharacter' => false,
            'ownedOnly'        => $ownedOnly,
        ]);

        return $this->convert($command, GetClanSummaryResult::class);
    }
}