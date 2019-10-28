<?php

namespace Alexa\Model\Interfaces\Alexa\Presentation\APL;

use \JsonSerializable;

final class ControlMediaCommand extends Command implements JsonSerializable
{
    const TYPE = 'ControlMedia';

    /** @var MediaCommandType|null */
    private $command = null;

    /** @var string|null */
    private $componentId = null;

    /** @var string|null */
    private $value = null;

    protected function __construct()
    {
        parent::__construct();
        $this->type = self::TYPE;
    }

    /**
     * @return MediaCommandType|null
     */
    public function command()
    {
        return $this->command;
    }

    /**
     * @return string|null
     */
    public function componentId()
    {
        return $this->componentId;
    }

    /**
     * @return string|null
     */
    public function value()
    {
        return $this->value;
    }

    public static function builder(): ControlMediaCommandBuilder
    {
        $instance = new self();
        $constructor = function ($command, $componentId, $value) use ($instance): ControlMediaCommand {
            $instance->command = $command;
            $instance->componentId = $componentId;
            $instance->value = $value;
            return $instance;
        };
        return new class($constructor) extends ControlMediaCommandBuilder
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
        $instance->command = isset($data['command']) ? MediaCommandType::fromValue($data['command']) : null;
        $instance->componentId = isset($data['componentId']) ? ((string) $data['componentId']) : null;
        $instance->value = isset($data['value']) ? ((string) $data['value']) : null;
        return $instance;
    }

    public function jsonSerialize(): array
    {
        return array_filter([
            'type' => self::TYPE,
            'command' => $this->command,
            'componentId' => $this->componentId,
            'value' => $this->value
        ]);
    }
}
