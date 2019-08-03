<?php

namespace Sdk\Message;

use Sdk\Dto\Command;

interface MessageInterface
{
    public function getCommand(): Command;
}