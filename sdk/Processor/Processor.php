<?php

namespace Sdk\Processor;

use Api\Client\SingleCommandClient;
use Sdk\Command\CommandInterface;
use Sdk\Processor\ProcessorInterface;
use Symfony\Component\PropertyInfo\Extractor\PhpDocExtractor;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\NameConverter\CamelCaseToSnakeCaseNameConverter;
use Symfony\Component\Serializer\Normalizer\ArrayDenormalizer;
use Symfony\Component\Serializer\Normalizer\PropertyNormalizer;
use Symfony\Component\Serializer\Serializer;

class Processor implements ProcessorInterface
{
    /**
     * @var SingleCommandClient
     */
    protected $client;

    /**
     * @var Serializer
     */
    protected $serializer;

    /**
     * @param SingleCommandClient $client
     */
    public function __construct(SingleCommandClient $client)
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
                new JsonEncoder(),
            ]
        );
    }

    public function process(CommandInterface $command): CommandInterface
    {
        $result = $this->serializer->deserialize(
            $this->serializer->serialize($this->client->executeCommand($command), 'json'),
            $command->getClassName(),
            'json'
        );

        return $command->setResult($result);
    }
}