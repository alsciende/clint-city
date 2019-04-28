<?php

namespace App\Oauth;

class Token
{
    /**
     * @var string
     */
    private $token;

    /**
     * @var string
     */
    private $secret;

    /**
     * Token constructor.
     * @param string $token
     * @param string $secret
     */
    public function __construct(string $token, string $secret)
    {
        $this->token = $token;
        $this->secret = $secret;
    }

    /**
     * @return string
     */
    public function getToken(): string
    {
        return $this->token;
    }

    /**
     * @return string
     */
    public function getSecret(): string
    {
        return $this->secret;
    }

    public static function fromArray(array $token): Token
    {
        return new self($token['oauth_token'], $token['oauth_token_secret']);
    }
}