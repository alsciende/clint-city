<?php

namespace Api\Dto;

interface CommandInterface extends \JsonSerializable
{
    public function getCall(): string;
    public function getParams(): array;
    public function getContextFilter(): array;
    public function getItemsFilter(): array;
    public function getData(): array;
}