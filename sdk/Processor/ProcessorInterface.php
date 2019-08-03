<?php

namespace Sdk\Processor;

use Sdk\Command\CommandInterface;

interface ProcessorInterface
{
    public function process(CommandInterface $command): CommandInterface;
}