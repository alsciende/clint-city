<?php

namespace Api\Client;

use Api\Dto\CommandInterface;
use Api\Dto\Request;

class SingleCommandClient extends GenericClient
{
    public function executeCommand(CommandInterface $command): array
    {
        $this->executeRequest(new Request($command));

        return $command->getResult();
    }
}