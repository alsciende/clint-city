<?php

namespace Sdk\Processor;

use Api\Client\SingleCommandClient;
use Doctrine\Common\Annotations\AnnotationReader;
use Psr\Log\LoggerAwareInterface;
use Psr\Log\LoggerAwareTrait;
use Sdk\Command\CommandInterface;
use Sdk\Processor\ProcessorInterface;
use Symfony\Component\PropertyInfo\Extractor\PhpDocExtractor;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Exception\ExtraAttributesException;
use Symfony\Component\Serializer\Mapping\Factory\ClassMetadataFactory;
use Symfony\Component\Serializer\Mapping\Loader\AnnotationLoader;
use Symfony\Component\Serializer\NameConverter\CamelCaseToSnakeCaseNameConverter;
use Symfony\Component\Serializer\Normalizer\AbstractNormalizer;
use Symfony\Component\Serializer\Normalizer\ArrayDenormalizer;
use Symfony\Component\Serializer\Normalizer\PropertyNormalizer;
use Symfony\Component\Serializer\Serializer;

class Processor implements ProcessorInterface, LoggerAwareInterface
{
    use LoggerAwareTrait;

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
        $classMetadataFactory = new ClassMetadataFactory(new AnnotationLoader(new AnnotationReader()));
        $this->serializer = new Serializer(
            [
                new PropertyNormalizer(
                    $classMetadataFactory,
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
        $data = $this->client->executeCommand($command);

        /**
         * @see https://github.com/phpstan/phpstan-symfony/pull/54
         *
         * $result = $this->serializer->denormalize($data, $command->getResultClassName());
         */


        $json = $this->serializer->serialize($data, 'json');

        try {
            $result = $this->serializer->deserialize(
                $json,
                $command->getResultClassName(),
                'json',
                [
                    AbstractNormalizer::ALLOW_EXTRA_ATTRIBUTES => false,
                ]
            );
        } catch (ExtraAttributesException $e) {
            $this->logger->debug('ExtraAttributesException', $data);
            throw $e;
        }

        return $command->setResult($result);
    }
}