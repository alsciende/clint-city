<?php

declare(strict_types=1);

namespace Api\Oauth;

use Psr\Log\LoggerAwareInterface;
use Psr\Log\LoggerAwareTrait;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;

class Factory implements LoggerAwareInterface
{
    use LoggerAwareTrait;

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
     *
     * @param string  $consumerKey
     * @param string  $consumerSecret
     * @param Storage $storage
     */
    public function __construct(string $consumerKey, string $consumerSecret, Storage $storage)
    {
        $this->consumerKey = $consumerKey;
        $this->consumerSecret = $consumerSecret;
        $this->storage = $storage;
    }

    /**
     * @return Client
     *
     * @throws \OAuthException
     */
    public function create(): Client
    {
        $client = new Client($this->consumerKey, $this->consumerSecret);

        $token = $this->storage->get();

        if ($token instanceof Token) {
            $client->setToken($token->getToken(), $token->getSecret());
        }

        return $client;
    }

    /**
     * Urban Rivals does not support url-encoding of the query parameters
     *
     * @param Token  $token
     * @param string $callback
     *
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
        $requestToken = $this->create()->getRequestToken('http://www.urban-rivals.com/api/auth/request_token.php');
        if (false === $requestToken) {
            throw new AccessDeniedException();
        }

        $token = Token::fromArray($requestToken);
        $this->storage->set($token);

        return $token;
    }

    public function getAccessToken(): Token
    {
        $accessToken = $this->create()->getAccessToken('http://www.urban-rivals.com/api/auth/access_token.php');
        if (false === $accessToken) {
            throw new AccessDeniedException();
        }

        $token = Token::fromArray($accessToken);
        $this->storage->set($token);

        return $token;
    }
}
