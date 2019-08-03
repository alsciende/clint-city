<?php

namespace Sdk\Command;

use Sdk\Result\GetCharacterVariationsResult;

class GetCharacterVariationsCommand extends AbstractCommand
{
    static public function getCallName(): string
    {
        return 'collections.getCharacterVariations';
    }

    public function getClassName(): string
    {
        return GetCharacterVariationsResult::class;
    }

    public function getResponse(): GetCharacterVariationsResult
    {
        return $this->response;
    }
}