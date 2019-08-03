<?php

namespace Sdk\Command;

use Sdk\Result\SetSelectionAsDeckResult;

class SetSelectionAsDeckCommand extends AbstractCommand
{
    static public function getCallName(): string
    {
        return 'collections.setSelectionAsDeck';
    }

    public function getClassName(): string
    {
        return SetSelectionAsDeckResult::class;
    }

    public function getResponse(): SetSelectionAsDeckResult
    {
        return $this->response;
    }
}