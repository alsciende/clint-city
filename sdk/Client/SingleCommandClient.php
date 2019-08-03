<?php

namespace Sdk\Client;

use Sdk\Dto\Command;
use Sdk\Dto\Request;

class SingleCommandClient extends GenericClient
{
    public function executeCommand(Command $command): array
    {
        $this->executeRequest(new Request($command));

        return $command->getResult();
    }
}