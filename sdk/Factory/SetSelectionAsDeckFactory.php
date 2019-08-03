<?php

namespace Sdk\Factory;

use Api\Dto\Command;
use Sdk\Command\SetSelectionAsDeckCommand;
use Sdk\Result\SetSelectionAsDeckResult;

class SetSelectionAsDeckFactory
{
    static public function create(
        array $characterInCollectionIDs = []
    ) {
        return new SetSelectionAsDeckCommand([
            'characterInCollectionIDs' => $characterInCollectionIDs,
        ]);
    }
}