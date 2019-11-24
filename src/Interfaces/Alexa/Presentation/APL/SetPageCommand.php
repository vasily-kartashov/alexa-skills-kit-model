<?php

namespace Alexa\Model\Interfaces\Alexa\Presentation\APL;

use JsonSerializable;

final class SetPageCommand extends Command implements JsonSerializable
{
    const TYPE = 'SetPage';

    /** @var string|null */
    private $componentId = null;

    /** @var Position|null */
    private $position = null;

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
     * @return Position|null
     */
    public function position()
    {
        return $this->position;
    }

    /**
     * @return string|null
     */
    public function value()
    {
        return $this->value;
    }

    public static function builder(): SetPageCommandBuilder
    {
        $instance = new self;
        return new class($constructor = function ($componentId, $position, $value) use ($instance): SetPageCommand {
            $instance->componentId = $componentId;
            $instance->position = $position;
            $instance->value = $value;
            return $instance;
        }) extends SetPageCommandBuilder {};
    }

    /**
     * @param string $componentId
     * @return self
     */
    public static function ofComponentId(string $componentId): SetPageCommand
    {
        $instance = new self;
        $instance->componentId = $componentId;
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
        $instance->componentId = isset($data['componentId']) ? ((string) $data['componentId']) : null;
        $instance->position = isset($data['position']) ? Position::fromValue($data['position']) : null;
        $instance->value = isset($data['value']) ? ((string) $data['value']) : null;
        return $instance;
    }

    public function jsonSerialize(): array
    {
        return array_filter([
            'type' => self::TYPE,
            'componentId' => $this->componentId,
            'position' => $this->position,
            'value' => $this->value
        ]);
    }
}
