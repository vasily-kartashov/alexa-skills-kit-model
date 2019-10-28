<?php

namespace Alexa\Model\Interfaces\Alexa\Presentation\APL;

use \JsonSerializable;

final class SetFocusCommand extends Command implements JsonSerializable
{
    const TYPE = 'SetFocus';

    /** @var string|null */
    private $componentId = null;

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

    public static function builder(): SetFocusCommandBuilder
    {
        $instance = new self();
        $constructor = function ($componentId) use ($instance): SetFocusCommand {
            $instance->componentId = $componentId;
            return $instance;
        };
        return new class($constructor) extends SetFocusCommandBuilder
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
        $instance->componentId = isset($data['componentId']) ? ((string) $data['componentId']) : null;
        return $instance;
    }

    public function jsonSerialize(): array
    {
        return array_filter([
            'type' => self::TYPE,
            'componentId' => $this->componentId
        ]);
    }
}
