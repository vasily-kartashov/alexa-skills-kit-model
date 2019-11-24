<?php

namespace Alexa\Model\Interfaces\Alexa\Presentation\APLT;

use Alexa\Model\Directive;
use \JsonSerializable;

final class ExecuteCommandsDirective extends Directive implements JsonSerializable
{
    const TYPE = 'Alexa.Presentation.APLT.ExecuteCommands';

    /** @var Command[] */
    private $commands = [];

    /** @var string|null */
    private $token = null;

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

    /**
     * @return string|null
     */
    public function token()
    {
        return $this->token;
    }

    public static function builder(): ExecuteCommandsDirectiveBuilder
    {
        $instance = new self;
        $constructor = function ($commands, $token) use ($instance): ExecuteCommandsDirective {
            $instance->commands = $commands;
            $instance->token = $token;
            return $instance;
        };
        return new class($constructor) extends ExecuteCommandsDirectiveBuilder
        {
            public function __construct(callable $constructor)
            {
                parent::__construct($constructor);
            }
        };
    }

    /**
     * @param array $commands
     * @return self
     */
    public static function ofCommands(array $commands): ExecuteCommandsDirective
    {
        $instance = new self;
        $instance->commands = $commands;
        return $instance;
    }

    /**
     * @param array $data
     * @return self
     */
    public static function fromValue(array $data)
    {
        $instance = new self;
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
        $instance->token = isset($data['token']) ? ((string) $data['token']) : null;
        return $instance;
    }

    public function jsonSerialize(): array
    {
        return array_filter([
            'type' => self::TYPE,
            'commands' => $this->commands,
            'token' => $this->token
        ]);
    }
}
