<?php

namespace Api\Exception;

class ApiException extends \RuntimeException
{
    /**
     * @var array
     */
    private $info;

    public function __construct(string $message, array $info, \OAuthException $previous)
    {
        $this->info = $info;
        parent::__construct($message, $info["http_code"] ?? 0, $previous);
    }
}