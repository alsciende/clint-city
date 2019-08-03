<?php

declare(strict_types=1);

namespace Api\Client;

use Api\Dto\Command;
use Api\Dto\Request;
use Api\Exception\ApiException;
use Api\Oauth\Factory;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ArrayDenormalizer;
use Symfony\Component\Serializer\Normalizer\JsonSerializableNormalizer;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

class GenericClient
{
    /**
     * @var Factory
     */
    private $factory;

    /**
     * @var Serializer
     */
    private $serializer;

    /**
     * @param Factory $factory
     */
    public function __construct(Factory $factory)
    {
        $this->factory = $factory;
        $this->serializer = new Serializer(
            [
                new JsonSerializableNormalizer(),
                new ObjectNormalizer(),
                new ArrayDenormalizer(),
            ],
            [
                new JsonEncoder(),
            ]
        );
    }

    public function executeRequest(Request $request): void
    {
        $client = $this->factory->create();

        $jsonRequest = $this->serializer->serialize($request, 'json');

        try {
            $success = $client->fetch('https://api.urban-rivals.com/api/', [
                'request' => $jsonRequest,
            ]);
        } catch (\OAuthException $exception) {
            throw new ApiException($client->getLastResponse(), $client->getLastResponseInfo(), $exception);
        }

        $lastResponse = $client->getLastResponse();

        if (false === $success) {
            throw new \Exception($lastResponse);
        }

        $response = $this->serializer->decode($lastResponse, 'json');

        foreach ($response as $call => $result) {
            $command = $request->getCommand($call);

            if ($command instanceof Command) {
                $command->setData($result);
            }
        }
    }
}
