<?php

namespace Sdk\Api;

use Symfony\Component\PropertyInfo\Extractor\PhpDocExtractor;
use Symfony\Component\Serializer\NameConverter\CamelCaseToSnakeCaseNameConverter;
use Symfony\Component\Serializer\Normalizer\ArrayDenormalizer;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\PropertyNormalizer;
use Symfony\Component\Serializer\Serializer;

class ResultDenormalizer implements DenormalizerInterface
{
    /**
     * @var Serializer
     */
    private $serializer;

    /**
     */
    public function __construct()
    {
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
            ]
        );
    }

    public function supportsDenormalization($data, $type, $format = null)
    {
        return is_array($data) && isset($data["context"]);
    }

    public function denormalize($data, $class, $format = null, array $context = [])
    {
        return $this->serializer->denormalize($data, $class);
    }
}