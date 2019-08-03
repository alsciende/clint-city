<?php

namespace Sdk\Message;

use Sdk\Api\Command;

interface MessageInterface
{
    public function getCommand(): Command;
}