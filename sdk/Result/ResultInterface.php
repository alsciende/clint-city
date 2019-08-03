<?php

namespace Sdk\Result;

interface ResultInterface
{
    public function getContext(): array;
    public function getItems(): ?array;
}