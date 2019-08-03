<?php

declare(strict_types=1);

namespace Sdk\Oauth;

use Sdk\Api\Command;
use Sdk\Api\Request;
use Sdk\Api\Response;
use Sdk\Api\Result;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ArrayDenormalizer;
use Symfony\Component\Serializer\Normalizer\JsonSerializableNormalizer;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

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
     * @var Serializer
     */
    private $serializer;

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
        $this->serializer = new Serializer(
            [
                new JsonSerializableNormalizer(),
                new ObjectNormalizer(),
                new ArrayDenormalizer(),
            ],
            [
                new JsonEncoder()
            ]
        );
    }

    /**
     * @return Client
     *
     * @throws \OAuthException
     */
    private function create(): Client
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

    public function execute(Request $request): void
    {
        $client = $this->create();

        $jsonRequest = $this->serializer->serialize($request, 'json');

        try {
            $success = $client->fetch('https://api.urban-rivals.com/api/', [
                'request' => $jsonRequest,
            ]);
        } catch (\OAuthException $exception) {
            dump($client->getLastResponseInfo());
            dump($client->getLastResponse());
            die;
        }

        $lastResponse = $client->getLastResponse();

        if (false === $success) {
            throw new \Exception($lastResponse);
        }

        $response = $this->serializer->decode($lastResponse, 'json');

        foreach ($response as $call => $result) {
            $command = $request->getCommand($call);

            if ($command instanceof Command) {
                $command->setResult($result);
            }
        }

    }
}
