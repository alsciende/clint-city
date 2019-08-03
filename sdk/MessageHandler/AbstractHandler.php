<?php

namespace Sdk\MessageHandler;

use Sdk\Api\Client;
use Sdk\Message\MessageInterface;
use Symfony\Component\PropertyInfo\Extractor\PhpDocExtractor;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\NameConverter\CamelCaseToSnakeCaseNameConverter;
use Symfony\Component\Serializer\Normalizer\ArrayDenormalizer;
use Symfony\Component\Serializer\Normalizer\PropertyNormalizer;
use Symfony\Component\Serializer\Serializer;

class AbstractHandler
{
    /**
     * @var Client
     */
    protected $client;

    /**
     * @var Serializer
     */
    protected $serializer;

    /**
     * GetCharacterVariationsHandler constructor.
     * @param Client             $client
     */
    public function __construct(Client $client)
    {
        $this->client = $client;
        $this->serializer = new Serializer(
            [
                new PropertyNormalizer(
                    null,
                    new CamelCaseToSnakeCaseNameConverter(),
                    new PhpDocExtractor()
                ),
                new ArrayDenormalizer(),
            ],
            [
                new JsonEncoder()
            ]
        );
    }

    protected function handle(MessageInterface $message, string $class)
    {
        return $this->serializer->deserialize(
            $this->serializer->serialize($this->client->executeCommand($message->getCommand()), 'json'),
            $class,
            'json'
        );
    }
}