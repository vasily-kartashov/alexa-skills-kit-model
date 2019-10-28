<?php

namespace Alexa\Model\Interfaces\Alexa\Presentation\APLT;

use \JsonSerializable;

final class ParallelCommand extends Command implements JsonSerializable
{
    const TYPE = 'Parallel';

    /** @var Command[] */
    private $commands = [];

    protected function __construct()
    {
        parent::__construct();
        $this->type = self::TYPE;
    }

    /**
     * @return Command[]
     */
    public function commands()
    {
        return $this->commands;
    }

    public static function builder(): ParallelCommandBuilder
    {
        $instance = new self();
        $constructor = function ($commands) use ($instance): ParallelCommand {
            $instance->commands = $commands;
            return $instance;
        };
        return new class($constructor) extends ParallelCommandBuilder
        {
            public function __construct(callable $constructor)
            {
                parent::__construct($constructor);
            }
        };
    }

    /**
     * @param array $data
     * @return self
     */
    public static function fromValue(array $data)
    {
        $instance = new self();
        $instance->type = self::TYPE;
        $instance->commands = [];
        if (isset($data['commands'])) {
            foreach ($data['commands'] as $item) {
                $element = isset($item) ? Command::fromValue($item) : null;
                if ($element !== null) {
                    $instance->commands[] = $element;
                }
            }
        }
        return $instance;
    }

    public function jsonSerialize(): array
    {
        return array_filter([
            'type' => self::TYPE,
            'commands' => $this->commands
        ]);
    }
}
