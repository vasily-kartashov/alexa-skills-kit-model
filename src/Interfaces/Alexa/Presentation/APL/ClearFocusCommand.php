<?php

namespace Alexa\Model\Interfaces\Alexa\Presentation\APL;

use \JsonSerializable;

final class ClearFocusCommand extends Command implements JsonSerializable
{
    const TYPE = 'ClearFocus';

    protected function __construct()
    {
        parent::__construct();
        $this->type = self::TYPE;
    }

    public static function builder(): ClearFocusCommandBuilder
    {
        $instance = new self();
        $constructor = function () use ($instance): ClearFocusCommand {
            return $instance;
        };
        return new class($constructor) extends ClearFocusCommandBuilder
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
        return $instance;
    }

    public function jsonSerialize(): array
    {
        return array_filter([
            'type' => self::TYPE
        ]);
    }
}
