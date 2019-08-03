<?php

namespace Api\Dto;

interface CommandInterface extends \JsonSerializable
{
    public function getCall(): string;
    public function getResult(): array;
}