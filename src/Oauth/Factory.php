<?php
/**
 * @author      Wizacha DevTeam <dev@wizacha.com>
 * @copyright   Copyright (c) Wizacha
 * @license     Proprietary
 */


namespace App\Oauth;

use App\Api\Request;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

class Factory
{
    /**
     * @var string
     */
    private $consumerKey;

    /**
     * @var string
     */
    private $consumerSecret;

    /**
     * @var Storage
     */
    private $storage;

    /**
     * Factory constructor.
     * @param string $consumerKey
     * @param string $consumerSecret
     * @param SessionInterface $session
     */
    public function __construct(string $consumerKey, string $consumerSecret, Storage $storage)
    {
        $this->consumerKey = $consumerKey;
        $this->consumerSecret = $consumerSecret;
        $this->storage = $storage;
    }

    /**
     * @return Client
     * @throws \OAuthException
     */
    private function create(): Client
    {
        $client = new Client($this->consumerKey, $this->consumerSecret);

        $token = $this->storage->get();

        if ($token instanceof Token) {
            $client->setToken($token->getToken(), $token->getSecret());;
        }

        return $client;
    }

    /**
     * Urban Rivals does not support url-encoding of the query parameters
     *
     * @param string $token
     * @param string $callback
     * @return string
     */
    public function getAuthorizeUrl(Token $token, string $callback): string
    {
        return sprintf(
            'http://www.urban-rivals.com/api/auth/authorize.php?oauth_token=%s&oauth_callback=%s',
            $token->getToken(),
            $callback
        );
    }

    public function getRequestToken(): Token
    {
        $token = Token::fromArray($this->create()->getRequestToken('http://www.urban-rivals.com/api/auth/request_token.php'));
        $this->storage->set($token);

        return $token;
    }

    public function getAccessToken(): Token
    {
        $token = Token::fromArray($this->create()->getAccessToken('http://www.urban-rivals.com/api/auth/access_token.php'));
        $this->storage->set($token);

        return $token;
    }

    public function execute(Request $request): void
    {
        $client = $this->create();

        $success = $client->fetch('https://api.urban-rivals.com/api/', [
            'request' => json_encode($request)
        ]);

        if (false === $success) {
            throw new \Exception($client->getLastResponse());
        }

        $request->setResult(json_decode($client->getLastResponse(), true));
    }
}