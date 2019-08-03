<?php

namespace Sdk\Handler;

use Api\Dto\Command;
use Sdk\Result\SetSelectionAsDeckResult;

class SetSelectionAsDeckHandler extends AbstractHandler
{
    public function handle(array $characterInCollectionIDs = []): SetSelectionAsDeckResult
    {
        $command = new Command('collections.setSelectionAsDeck', [
            'characterInCollectionIDs' => $characterInCollectionIDs,
        ]);

        return $this->convert($command, SetSelectionAsDeckResult::class);
    }
}