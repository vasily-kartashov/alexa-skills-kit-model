<?php

namespace Alexa\Model\Interfaces\Alexa\Presentation\APL;

use \JsonSerializable;

final class SetStateCommand extends Command implements JsonSerializable
{
    const TYPE = 'SetState';

    /** @var string|null */
    private $componentId = null;

    /** @var ComponentState|null */
    private $state = null;

    /** @var string|null */
    private $value = null;

    protected function __construct()
    {
        parent::__construct();
        $this->type = self::TYPE;
    }

    /**
     * @return string|null
     */
    public function componentId()
    {
        return $this->componentId;
    }

    /**
     * @return ComponentState|null
     */
    public function state()
    {
        return $this->state;
    }

    /**
     * @return string|null
     */
    public function value()
    {
        return $this->value;
    }

    public static function builder(): SetStateCommandBuilder
    {
        $instance = new self;
        $constructor = function ($componentId, $state, $value) use ($instance): SetStateCommand {
            $instance->componentId = $componentId;
            $instance->state = $state;
            $instance->value = $value;
            return $instance;
        };
        return new class($constructor) extends SetStateCommandBuilder
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
        $instance = new self;
        $instance->type = self::TYPE;
        $instance->componentId = isset($data['componentId']) ? ((string) $data['componentId']) : null;
        $instance->state = isset($data['state']) ? ComponentState::fromValue($data['state']) : null;
        $instance->value = isset($data['value']) ? ((string) $data['value']) : null;
        return $instance;
    }

    public function jsonSerialize(): array
    {
        return array_filter([
            'type' => self::TYPE,
            'componentId' => $this->componentId,
            'state' => $this->state,
            'value' => $this->value
        ]);
    }
}
