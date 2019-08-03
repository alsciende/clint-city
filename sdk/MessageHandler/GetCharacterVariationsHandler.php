<?php

namespace Sdk\MessageHandler;

use Sdk\Message\GetCharacterVariationsQuery;
use Sdk\Result\GetCharacterVariationsResult;
use Symfony\Component\Messenger\Handler\MessageHandlerInterface;

class GetCharacterVariationsHandler extends AbstractHandler  implements MessageHandlerInterface
{
    public function __invoke(GetCharacterVariationsQuery $message): GetCharacterVariationsResult
    {
        return $this->handle($message, GetCharacterVariationsResult::class);
    }
}