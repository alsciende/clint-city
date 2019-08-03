<?php

declare(strict_types=1);

namespace Api\Dto;

/**
 * Data class for a request sent to the API.
 *
 * Each request holds one or more commands that are sent together to the API.
 */
class Request implements \JsonSerializable
{
    /**
     * @var CommandInterface[]
     */
    private $commands;

    /**
     * Request constructor.
     *
     * @param CommandInterface ...$commands
     */
    public function __construct(...$commands)
    {
        foreach ($commands as $command) {
            $this->addCommand($command);
        }
    }

    /**
     * @return CommandInterface[]
     */
    public function getCommands(): array
    {
        return $this->commands;
    }

    /**
     * @param string $call
     *
     * @return CommandInterface|null
     */
    public function getCommand(string $call): ?CommandInterface
    {
        return $this->commands[$call] ?? null;
    }

    /**
     * @param CommandInterface $command
     */
    public function addCommand(CommandInterface $command)
    {
        if (isset($this->commands[$command->getCall()])) {
            throw new \LogicException('Cannot request 2 commands with the same call ' . $command->getCall());
        }

        $this->commands[$command->getCall()] = $command;
    }

    /**
     * {@inheritdoc}
     */
    public function jsonSerialize()
    {
        return array_map(function (CommandInterface $command) {
            return $command->jsonSerialize();
        }, array_values($this->commands));
    }
}
