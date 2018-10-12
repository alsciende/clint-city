<?php

namespace App\Api;

class Request implements \JsonSerializable
{
    /**
     * @var Command[]
     */
    private $commands;

    /**
     * Request constructor.
     * @param Command[] $commands
     */
    public function __construct(...$commands)
    {
        foreach ($commands as $command) {
            $this->addCommand($command);
        }
    }


    /**
     * @return Command[]
     */
    public function getCommands(): array
    {
        return $this->commands;
    }

    /**
     * @param string $call
     * @return Command|null
     */
    public function getCommand(string $call): ?Command
    {
        return $this->commands[$call] ?? null;
    }

    /**
     * @param Command $command
     */
    public function addCommand(Command $command)
    {
        if (isset($this->commands[$command->getCall()])) {
            throw new \LogicException('Cannot request 2 commands with the same call ' . $command->getCall());
        }

        $this->commands[$command->getCall()] = $command;
    }

    public function setResult(array $data)
    {
        foreach($data as $call => $result) {
            $command = $this->getCommand($call);

            if ($command instanceof Command) {
                $command->setResult($result);
            }
        }
    }

    /**
     * @inheritdoc
     */
    public function jsonSerialize()
    {
        return array_map(function (Command $command) {
            return $command->jsonSerialize();
        }, array_values($this->commands));
    }
}