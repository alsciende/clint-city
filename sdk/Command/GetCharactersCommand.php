<?php

namespace Sdk\Command;

use Sdk\Result\GetCharactersResult;

class GetCharactersCommand extends AbstractCommand
{
    static public function getCallName(): string
    {
        return 'characters.getCharacters';
    }

    public function getClassName(): string
    {
        return GetCharactersResult::class;
    }

    public function getResponse(): GetCharactersResult
    {
        return $this->response;
    }
}