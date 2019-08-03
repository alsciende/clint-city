<?php

namespace Sdk\Handler;

use Api\Dto\Command;
use Sdk\Result\GetPresetsResult;

class GetPresetsHandler extends AbstractHandler
{
    public function handle(?int $deckFormatID = null): GetPresetsResult
    {
        $command = new Command('collections.getPresets', [
            'deckFormatID' => $deckFormatID,
        ]);

        return $this->convert($command, GetPresetsResult::class);
    }
}