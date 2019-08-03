<?php

declare(strict_types=1);

namespace Sdk\Api;

use Sdk\Oauth\Factory;
use Symfony\Component\Serializer\Serializer;

class Client
{
    /**
     * @var Factory
     */
    private $factory;

    /**
     * AbstractApiService constructor.
     *
     * @param Factory $factory
     */
    public function __construct(Factory $factory)
    {
        $this->factory = $factory;
    }

    public function getFactory(): Factory
    {
        return $this->factory;
    }

    public function executeCommand(Command $command): array
    {
        $this->factory->execute(new Request($command));

        return $command->getResult();
    }

    public function getLastContext(): array
    {
        return [];
    }
    
    public function denormalizeArray($data, $class)
    {
        return [];
    }
}
