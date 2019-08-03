<?php

namespace Sdk\Command;

interface CommandInterface extends \Api\Dto\CommandInterface
{
    public function getResultClassName(): string;
    public function setResult($result);
    public function getResult();
}