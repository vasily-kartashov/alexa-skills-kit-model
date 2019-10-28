<?php

namespace Alexa\Model\Interfaces\Alexa\Presentation\APL;

use \JsonSerializable;

final class SequentialCommand extends Command implements JsonSerializable
{
    const TYPE = 'Sequential';

    /** @var Command[] */
    private $catch = [];

    /** @var Command[] */
    private $commands = [];

    /** @var Command[] */
    private $finally = [];

    /** @var string|null */
    private $repeatCount = null;

    protected function __construct()
    {
        parent::__construct();
        $this->type = self::TYPE;
    }

    /**
     * @return Command[]
     */
    public function catch()
    {
        return $this->catch;
    }

    /**
     * @return Command[]
     */
    public function commands()
    {
        return $this->commands;
    }

    /**
     * @return Command[]
     */
    public function finally()
    {
        return $this->finally;
    }

    /**
     * @return string|null
     */
    public function repeatCount()
    {
        return $this->repeatCount;
    }

    public static function builder(): SequentialCommandBuilder
    {
        $instance = new self();
        $constructor = function ($catch, $commands, $finally, $repeatCount) use ($instance): SequentialCommand {
            $instance->catch = $catch;
            $instance->commands = $commands;
            $instance->finally = $finally;
            $instance->repeatCount = $repeatCount;
            return $instance;
        };
        return new class($constructor) extends SequentialCommandBuilder
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
        $instance->catch = [];
        if (isset($data['catch'])) {
            foreach ($data['catch'] as $item) {
                $element = isset($item) ? Command::fromValue($item) : null;
                if ($element !== null) {
                    $instance->catch[] = $element;
                }
            }
        }
        $instance->commands = [];
        if (isset($data['commands'])) {
            foreach ($data['commands'] as $item) {
                $element = isset($item) ? Command::fromValue($item) : null;
                if ($element !== null) {
                    $instance->commands[] = $element;
                }
            }
        }
        $instance->finally = [];
        if (isset($data['finally'])) {
            foreach ($data['finally'] as $item) {
                $element = isset($item) ? Command::fromValue($item) : null;
                if ($element !== null) {
                    $instance->finally[] = $element;
                }
            }
        }
        $instance->repeatCount = isset($data['repeatCount']) ? ((string) $data['repeatCount']) : null;
        return $instance;
    }

    public function jsonSerialize(): array
    {
        return array_filter([
            'type' => self::TYPE,
            'catch' => $this->catch,
            'commands' => $this->commands,
            'finally' => $this->finally,
            'repeatCount' => $this->repeatCount
        ]);
    }
}
