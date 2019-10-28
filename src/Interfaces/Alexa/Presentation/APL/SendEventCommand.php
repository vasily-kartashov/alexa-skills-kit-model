<?php

namespace Alexa\Model\Interfaces\Alexa\Presentation\APL;

use \JsonSerializable;

final class SendEventCommand extends Command implements JsonSerializable
{
    const TYPE = 'SendEvent';

    /** @var string[] */
    private $arguments = [];

    /** @var string[] */
    private $components = [];

    protected function __construct()
    {
        parent::__construct();
        $this->type = self::TYPE;
    }

    /**
     * @return string[]
     */
    public function arguments()
    {
        return $this->arguments;
    }

    /**
     * @return string[]
     */
    public function components()
    {
        return $this->components;
    }

    public static function builder(): SendEventCommandBuilder
    {
        $instance = new self;
        $constructor = function ($arguments, $components) use ($instance): SendEventCommand {
            $instance->arguments = $arguments;
            $instance->components = $components;
            return $instance;
        };
        return new class($constructor) extends SendEventCommandBuilder
        {
            public function __construct(callable $constructor)
            {
                parent::__construct($constructor);
            }
        };
    }

    /**
     * @param array $arguments
     * @return self
     */
    public static function ofArguments(array $arguments): SendEventCommand
    {
        $instance = new self;
        $instance->arguments = $arguments;
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
        $instance->arguments = [];
        if (isset($data['arguments'])) {
            foreach ($data['arguments'] as $item) {
                $element = isset($item) ? ((string) $item) : null;
                if ($element !== null) {
                    $instance->arguments[] = $element;
                }
            }
        }
        $instance->components = [];
        if (isset($data['components'])) {
            foreach ($data['components'] as $item) {
                $element = isset($item) ? ((string) $item) : null;
                if ($element !== null) {
                    $instance->components[] = $element;
                }
            }
        }
        return $instance;
    }

    public function jsonSerialize(): array
    {
        return array_filter([
            'type' => self::TYPE,
            'arguments' => $this->arguments,
            'components' => $this->components
        ]);
    }
}
