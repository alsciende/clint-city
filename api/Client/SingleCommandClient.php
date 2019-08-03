<?php

namespace Api\Client;

use Api\Dto\Command;
use Api\Dto\Request;

class SingleCommandClient extends GenericClient
{
    public function executeCommand(Command $command): array
    {
        $this->executeRequest(new Request($command));

        return $command->getResult();
    }
}